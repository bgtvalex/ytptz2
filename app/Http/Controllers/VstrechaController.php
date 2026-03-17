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

        // Разбиение строки с данными по посетителям, на отдельных посетителей
        $visitors = array();
        $visitors = explode(',', $req->input('visitors'));

        // Создать встречу
        $vstrecha = new Vstrecha();
        $vstrecha->data = $req->input('data');
        $vstrecha->tip_id = $req->input('tip_id');
        $vstrecha->otvetstvenny_id = $req->input('otvetstvenny');
        $vstrecha->theme = $req->input('theme');
        $vstrecha->place = $req->input('place');
        $vstrecha->save();

        // Добавить новые персоны (гостей)
        // Разбиение строки с данными по новым персонам, на отдельные персоны
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

        // Добавить посещения
        foreach ($visitors as $visitor) {
            // Создать посещение
            $visit = new Visit;
            $visit->vstrecha_id = $vstrecha->id;
            $visit->person_id = $visitor;
            $visit->save();
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