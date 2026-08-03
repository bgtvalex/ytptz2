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

    public function version_edit(){
        $versions = Version::all();
        // $version->update([
        //         'status' => 'в процессе',
        //     ]
        // );
        // dd('updated');
        return view('version_edit', compact('versions'));
    }

    public function version_del(){
        // удаление (Soft Delete)
        /*
        $version = Version::find(10);
        $version->delete();
        dd($version->version, 'is deleted');
        */

        // восстановление 
        /*
        $ver = Version::withTrashed()->find(6);
        $ver->restore();
        dd('restore');
        */
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
