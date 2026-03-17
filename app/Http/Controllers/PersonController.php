<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Spatie\FlareClient\View;
use App\Http\Requests\NewPersonRequest;
use App\Models\Person;
use App\Models\Leader;
use App\Models\Pol;
use Illuminate\Support\Facades\DB;

class PersonController extends Controller
{
    //

    public function person_add(NewPersonRequest $req)
    {
        $person = new Person();
        $person->fio = $req->input('fio');
        $person->pol_id = $req->input('pol_id');
        $person->data_rozhd = $req->input('data_rozhd');
        $person->mesto_rozhd = $req->input('mesto_rozhd');
        $person->telefon = $req->input('telefon');
        $person->socials = $req->input('socials');
        $person->comments = $req->input('comments');
        if ($req->has('is_leader'))
            $person->is_leader = 1;
        $person->save();

        return redirect()->route('person_all')->with('success','Персона успешно добавлена!');
    }


    public function person_all(Request $req)
    {
        // Запросить посещения гостей (неактивных пользователей)
        $guests = Person::all()
        ->where('active', "=", 0)
        ->sortBy('fio');

        foreach ($guests as $guest) {

            $guest->visits = DB::table('visits')
                ->join('vstrechi', 'visits.vstrecha_id', '=', 'vstrechi.id')
                ->join('tips_vstrechi', 'vstrechi.tip_id', '=', 'tips_vstrechi.id')
                ->select('vstrechi.id as vstrecha_id',
                    'tips_vstrechi.tip as tip_vstrechi',
                    'vstrechi.data as data_vstrechi',
                    'vstrechi.theme as theme_vstrechi',
                    'vstrechi.place as place_vstrechi')
                ->where('visits.person_id', '=', $guest->id)
                ->get();
        }

        $person = Person::all()->sortBy('fio');
        return view('person_all', ['data' => $person, 'guests' => $guests]);
    }


    public function person_edit($id)
    {
        $pols = Pol::all()->sortBy('id');
        $person = new Person();
        return view('person_edit', ['data' => $person->find($id), 'pols' => $pols]);
    }

    public function person_show($id)
    {
        $pols = Pol::all()->sortBy('id');
        $person = new Person();
        return view('person_show', ['person' => $person->find($id), 'pols' => $pols]);
    }


    public function submit_person_edit($id, NewPersonRequest $req)
    {
        $person = Person::find($id);
        $person->fio = $req->input('fio');
        $person->pol_id = $req->input('pol_id');
        $person->data_rozhd = $req->input('data_rozhd');
        $person->mesto_rozhd = $req->input('mesto_rozhd');
        $person->telefon = $req->input('telefon');
        $person->socials = $req->input('socials');
        $person->comments = $req->input('comments');
        if ($req->has('is_leader'))
            $person->is_leader = 1;
        else 
            $person->is_leader = 0;

        $person->save();

        return redirect()->route('person_edit', $person->id)->with('success','Сведения о персоне успешно обновлены!');
    }

}