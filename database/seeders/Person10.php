<?php

namespace Database\Seeders;

use Hamcrest\Type\IsString;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class Person10 extends Seeder
{
    static $persons = [
        ['fio' => 'Мироманов Илья',    'telefon' => '8900000000','guest' => 0,'is_leader' => 1,'pol' => 2],
        ['fio' => 'Базика Андрей',     'telefon' => '',          'guest' => 0,'is_leader' => 0,'pol' => 2],
        ['fio' => 'Сиротин Павел',     'telefon' => '',          'guest' => 0,'is_leader' => 0,'pol' => 2],
        ['fio' => 'Сиротин Александр', 'telefon' => '',          'guest' => 0,'is_leader' => 0,'pol' => 2],
        ['fio' => 'Зинков Никита',     'telefon' => '',          'guest' => 0,'is_leader' => 0,'pol' => 2],
        ['fio' => 'Захаров Егор',      'telefon' => '',          'guest' => 0,'is_leader' => 0,'pol' => 2],
        ['fio' => 'Котов Виктор',      'telefon' => '',          'guest' => 0,'is_leader' => 0,'pol' => 2],
        ['fio' => 'Амелина Олеся',     'telefon' => '',          'guest' => 0,'is_leader' => 0,'pol' => 3],
        ['fio' => 'Семукова Екатерина','telefon' => '',          'guest' => 0,'is_leader' => 0,'pol' => 3],
        ['fio' => 'Москвина Елизавета','telefon' => '',          'guest' => 1,'is_leader' => 0,'pol' => 3]
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
                'guest' => $person['guest'],
                'is_leader' => $person['is_leader'],
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
// $table->boolean('is_leader')->default(0);
// $table->boolean('critical')->nullable();