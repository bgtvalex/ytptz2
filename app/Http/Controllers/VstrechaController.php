<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Person;
use App\Models\Tip_vstrechi;
use App\Models\Vstrecha;
use App\Models\Visit;
use Illuminate\Support\Facades\DB;

class VstrechaController extends Controller
{
    //
    public function vstrecha_add_page() {
        $all_leaders = Person::all()
        ->where('is_leader', "=", 1)
        ->sortBy('fio');

        $all_persons = Person::all()->sortBy('fio');

        $tips_vstrechi = Tip_vstrechi::all()->sortBy('id');

        return view('vstrecha_add',
        [
            'leaders' => $all_leaders,
            'tips_vstrechi' => $tips_vstrechi
        ]);
    }



    public function post_vstrecha_add(Request $req) {
        $all_leaders = Person::all()
        ->where('is_leader', "=", 1)
        ->sortBy('fio');
        $tips_vstrechi = Tip_vstrechi::all()->sortBy('id');

        // Создать встречу
        $vstrecha = new Vstrecha();
        $vstrecha->data = $req->input('data');
        $vstrecha->tip_id = $req->input('tip_id');
        if ($req->input('otvetstvenny')) {
            $vstrecha->otvetstvenny_id = $req->input('otvetstvenny');
        }
        $vstrecha->theme = $req->input('theme');
        $vstrecha->place = $req->input('place');
        $vstrecha->save();


        // Разбиение строки с данными по известным посетителям, на отдельных посетителей
        $knownVisitors = $req->input('visitors');
        if (!empty(trim($knownVisitors))) {
            $visitors = array();
            $visitors = explode(',', $knownVisitors);
            
            // Добавить посещения
            foreach ($visitors as $visitor) {
                // Создать посещение
                $visit = new Visit;
                $visit->vstrecha_id = $vstrecha->id;
                $visit->person_id = $visitor;
                $visit->save();
            }
        }

        
        // Добавить новые персоны (гостей)
        // Разбиение строки с данными по новым персонам, на отдельные персоны
        if ($req->input('new_persons')) {
            $new_persons = array();
            $new_persons = explode(',', $req->input('new_persons'));
                foreach ($new_persons as $new_person_fio) {
                    $person = new Person;
                    $person->fio = $new_person_fio;
                    $person->active = 0;
                    $person->save();
                    // Создать посещение
                    $visit = new Visit;
                    $visit->vstrecha_id = $vstrecha->id;
                    $visit->person_id = $person->id;
                    $visit->save();
                }
        }
        
        return view('vstrecha_add',
        [
            'leaders' => $all_leaders,
            'tips_vstrechi' => $tips_vstrechi]
            )->with('success','Встреча успешно добавлена!');
    }



    public function vstrecha_all(Request $req)
    {
        $all_vstrechas = DB::table('vstrechi')
            ->join('tips_vstrechi', 'vstrechi.tip_id', '=', 'tips_vstrechi.id')
            ->join('persons', 'vstrechi.otvetstvenny_id', '=', 'persons.id')
            ->select('persons.fio',
                    'vstrechi.id',
                    'tips_vstrechi.tip',
                    'vstrechi.data',
                    'vstrechi.theme',
                    'vstrechi.place')
            ->orderBy('data')
            ->get();

        foreach ($all_vstrechas as $vstrecha) {
            $vstrecha->visitors = DB::table('visits')
            ->where('vstrecha_id', "=", $vstrecha->id)
            ->get();
            $vstrecha->num = DB::table('visits')
            ->where('vstrecha_id', "=", $vstrecha->id)
            ->count();
        }
        
        return view('vstrecha_all', ['vstrechi' => $all_vstrechas]);
    }



// ТАБЛИЦА ПОСЕЩЕНИЙ

public function visits_table()
{
    // 1. Плоский список
    $rows = DB::select("
        SELECT
            persons.id AS person_id,
            persons.fio AS person_name,
            vstrechi.id AS vstrechi_id,
            vstrechi.theme AS vstrechi_theme,
            DATE_FORMAT(vstrechi.data, '%d.%m.%Y') AS vstrechi_data,
            visits.id IS NOT NULL AS attended,
            vstrechi.otvetstvenny_id AS otv_id,
            resp.fio AS otv_name
        FROM persons
        CROSS JOIN vstrechi
        LEFT JOIN visits
            ON visits.person_id = persons.id
            AND visits.vstrecha_id = vstrechi.id
        LEFT JOIN persons AS resp
            ON resp.id = vstrechi.otvetstvenny_id
        ORDER BY persons.fio, vstrechi.data, vstrechi.theme
    ");

    // 2. Фиксируем порядок столбцов (уникальные встречи, отсортированные по дате)
    $meetings = collect($rows)
        ->unique('vstrechi_id')
        ->sortBy('vstrechi_data')
        ->map(function ($m) {
            return [
                'vstrechi_id'   => $m->vstrechi_id,
                'vstrechiTheme' => $m->vstrechi_theme,
                'vstrechi_data' => $m->vstrechi_data,
                'otv_name'      => $m->otv_name,
            ];
        })
        ->values();

    // 3. Группируем по персоне
    $byPerson = collect($rows)->groupBy('person_id');

    // 4. Строим матрицу: сохраняем реальные ID встреч как ключи
    $matrix = $byPerson->map(function ($personRows) use ($meetings) {
        $person = $personRows->first();

        $result = [
            'person_id'   => $person->person_id,
            'person_name' => $person->person_name,
        ];

        foreach ($meetings as $meeting) {
            $row = $personRows->first(fn($r) => $r->vstrechi_id === $meeting['vstrechi_id']);
            $result[$meeting['vstrechi_id']] = $row && $row->attended ? '+' : '';
        }

        return $result;
    })->values();

    return view('visits_table', [
        'columns' => $meetings,
        'rows'    => $matrix,
    ]);
}


/*Schema::create('vstrechi', function (Blueprint $table) {
    $table->id()->autoIncrement();
    $table->date('data');
    $table->unsignedBigInteger('tip_id');
    $table->foreign('tip_id')->references('id')->on('tips_vstrechi');
    $table->unsignedBigInteger('otvetstvenny_id')->nullable();
    $table->foreign('otvetstvenny_id')->references('id')->on('persons');
    $table->string('theme',100)->nullable();
    $table->string('place',100)->nullable();
    $table->timestamps();
});*/

};