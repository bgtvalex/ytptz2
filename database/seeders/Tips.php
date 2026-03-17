<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class Tips extends Seeder
{
    static $tips = [
        'Молодежка',
        'Домашка',
        'Вечерняя молитва',
        'Выезд в церкви Карелии',
        'Выезд за пределы Карелии',
        'Общий выезд',
        'Ночная молитва'
    ];

    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        foreach (self::$tips as $tip) {
            DB::table('tips_vstrechi')->insert([
                'tip' => $tip
            ]);
        }
    }
}


/*Schema::create('tips_vstrechi', function (Blueprint $table) {
    $table->id()->autoIncrement();
    $table->string('tip', 100);
    $table->timestamps();
});*/