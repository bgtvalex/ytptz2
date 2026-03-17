<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class Pol extends Seeder
{
    static $pols = [
        'Не указан', // id 0
        'Мужской', // id 1
        'Женский' // id 2
    ];

    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        foreach (self::$pols as $pol) {
            DB::table('pols')->insert([
                'name' => $pol
            ]);
        }
    }
}
