<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Version;

class VersionController extends Controller
{


    public function version_all() {
        // $versions = Version::all();
        $versions = Version::where('status', 'сделано')->get();
        $str = 'version';
        foreach($versions as $version) {
            dump($version->version);
        }
    }

    public function version_add() {
        $versionsArr = [
            [
                'version' => '0.1.7',
                'theme' => 'Персоны',
                'desc' => 'Добавление персоны в общий список ЦА.',
                'status' => 'сделано',
            ],
            [
                'version' => '0.1.8',
                'theme' => 'Персоны',
                'desc' => 'В списках персон номер телефона интерактивен: если у персоны указан номер телефона, ему можно сразу позвонить в один клик.',
                'status' => 'сделано',
            ],
        ];

        // Version::create([
        //     'version' => '0.1.6',
        //     'theme' => 'Персоны',
        //     'desc' => 'Переход к редактированию персоны через ввод с подсказкой, на странице редактирования персон.',
        //     'status' => 'сделано',
        // ]);
        foreach($versionsArr as $item) {
           Version::create($item);
        }

        dd('created!!!');
    }

    public function version_edit(){
        $version = Version::find(5);
        $version->update([
                'status' => 'в процессе',
            ]
        );
        dd('updated');
    }

    public function version_del(){
        // удаление (Soft Delete)
        /*
        $version = Version::find(6);
        $version->delete();
        dd('is deleted');
        */

        // восстановление 
        /*
        $ver = Version::withTrashed()->find(6);
        $ver->restore();
        dd('restore');
        */
    }
}
