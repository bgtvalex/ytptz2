<?php

namespace Database\Seeders;

use Hamcrest\Type\IsString;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class Person10 extends Seeder
{
    static $persons = [
        ['fio' => 'Базика Андрей',      'telefon' => '', 'pol' => 2],
        ['fio' => 'Сиротин Павел',      'telefon' => '', 'pol' => 2],
        ['fio' => 'Сиротин Александр',  'telefon' => '', 'pol' => 2],
        ['fio' => 'Мироманов Илья',  'telefon' => '8900000000', 'pol' => 2],
        ['fio' => 'Зинков Никита',        'telefon' => '', 'pol' => 2],
        ['fio' => 'Амелина Олеся',      'telefon' => '', 'pol' => 3],
        ['fio' => 'Семукова Екатерина', 'telefon' => '', 'pol' => 3],
        ['fio' => 'Захаров Егор',     'telefon' => '', 'pol' => 2],
        ['fio' => 'Котов Виктор',       'telefon' => '', 'pol' => 2],
        ['fio' => 'Москвина Елизавета', 'telefon' => '', 'pol' => 3]
    ];
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        foreach (self::$persons as $person) {
            DB::table('persons')->insert([
                'fio' => $person['fio'],
                'telefon' => $person['telefon'],
                'pol_id' => $person['pol']
            ]);
        }
    }
}

// $table->id();
// $table->string('fio',100)->unique();
// $table->date('data_rozhd')->nullable();
// $table->string('mesto_rozhd',100)->nullable();
// $table->boolean('pol')->nullable();
// $table->string('telefon',100)->nullable();
// $table->string('socials',100)->nullable();
// $table->boolean('active')->default(1); // boolean === tinyInt
// $table->boolean('critical')->nullable();