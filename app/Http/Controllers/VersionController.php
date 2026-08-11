<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Spatie\FlareClient\View;
use App\Http\Requests\NewVersionRequest;
use App\Models\Version;
use Illuminate\Support\Facades\DB;

class VersionController extends Controller
{
    public function index() {
        $versions = Version::all();
        return view('version.index', compact('versions'));
    }

    public function create() {
        $versions = Version::all();
        return view('version.create', compact('versions'));
    }

    public function store() {
        $data = request()->validate([
            'version' => 'string',
            'theme' => 'string',
            'desc' => 'string',
            'status' => 'string',
        ]);
        Version::create($data);
        return redirect()->route('versions.index');
    }

    public function show(Version $version) {
       return view('version.show', compact('version'));
    }

    public function edit(Version $version) {
       return view('version.edit', compact('version'));
    // dd($version);
    }

    public function update(Version $version){
        $data = request()->validate([
            'version' => 'string',
            'theme' => 'string',
            'desc' => 'string',
            'status' => 'string',
        ]);
        $version->update($data);
        return redirect()->route('versions.index');
    }

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
