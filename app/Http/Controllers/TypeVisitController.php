<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Spatie\FlareClient\View;
use App\Http\Requests\NewVersionRequest;
use App\Models\Tip_vstrechi;
use Illuminate\Support\Facades\DB;

class TypeVisitController extends Controller
{
    public function index() {
        $types = Tip_vstrechi::all();
        return view('type_visits.index', compact('types'));
    }

    public function create() {
        $types = Tip_vstrechi::all();
        return view('type_visits.create', compact('types'));
    }

    public function store() {
        $data = request()->validate([
            'tip' => 'string'
        ]);
        Tip_vstrechi::create($data);
        return redirect()->route('type-visits.index');
    }
/* Edit 
    public function edit(Tip_vstrechi $type) {
       return view('type_visits.edit', compact('type'));
    }

    public function update(Tip_vstrechi $type){
        $data = request()->validate([
            'tip' => 'string'
        ]);
        $type->update($data);
        return redirect()->route('type_visits.index');
    }
*/



    // начало варианты Ильи
    public function type_visits_edit($id)
    {
        $pols = Pol::all()->sortBy('id');
        $type = new Tip_vstrechi();
        return view('type_visits_edit', ['data' => $type->find($id), 'pols' => $pols]);
    }
    
    public function submit_type_visits_edit($id, NewTypeVisitsRequest $req)
    {
        $type = Tip_vstrechi::find($id);
        $type->tip = $req->input('tip');

        $type->save();

        return redirect()->route('type_visits_edit', $type->id)->with('success','Название успешно изменено!');
    }
    // конец варианты Ильи

    public function destroy(Version $version){
        $version->delete();
        return redirect()->route('versions.index');
    }

    // firstOrCreate
    public function firstOrCreate(){
        $version = Version::find(5);
        
        $versionAnother = [
                'version' => '0.1.5',
                'theme' => 'Персоны',
                'desc' => 'Переход к редактированию персоны с общего списка ЦА.',
                'status' => 'сделано',
            ];

        $version = Version::firstOrCreate([
            'version' => '0.1.5 first',
            ],$versionAnother);
        dump($version->version, $version->status);
        dump('firstOrCreate');
    }
    
    // updateOrCreate
    public function updateOrCreate(){
        $version = Version::find(5);
        $versionAnother = [
                'version' => '0.1.5 update',
                'theme' => 'Персоны',
                'desc' => 'Переход к редактированию персоны с общего списка ЦА.',
                'status' => 'не начато',
            ];
        $version = Version::updateOrCreate([
            'version' => '0.1.5 update'
        ], $versionAnother);
        dd('update or create');
    }
}
