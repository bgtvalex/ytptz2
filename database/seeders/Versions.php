<?php

namespace Database\Seeders;

use Hamcrest\Type\IsString;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class Versions extends Seeder
{
    static $versions = [
            [
                'version' => '0.1.1',
                'theme' => 'Общее',
                'desc' => '(С точки зрения безопасности) Просмотр/редактирование данных доступен только с авторизацией.',
                'status' => 'сделано',
            ],
            [
                'version' => '0.1.2',
                'theme' => 'Персоны',
                'desc' => 'Ввод и хранение сведений персон: ФИО, дата рождения, место рождения, контакты (телефон, соцсети, мессенджер), комментарий служителей.',
                'status' => 'сделано',
            ],
            [
                'version' => '0.1.3',
                'theme' => 'Персоны',
                'desc' => 'Просмотр общего списка ЦА.',
                'status' => 'сделано',
            ],
            [
                'version' => '0.1.4',
                'theme' => 'Персоны',
                'desc' => 'Просмотр/редактирование персон.',
                'status' => 'сделано',
            ],
            [
                'version' => '0.1.5',
                'theme' => 'Персоны',
                'desc' => 'Переход к редактированию персоны с общего списка ЦА.',
                'status' => 'сделано',
            ],
            [
                'version' => '0.1.6',
                'theme' => 'Персоны',
                'desc' => 'Переход к редактированию персоны через ввод с подсказкой, на странице редактирования персон.',
                'status' => 'сделано',
            ],
            [
                'version' => '0.1.7',
                'theme' => 'Персоны',
                'desc' => 'Добавление персоны в общий список ЦА.',
                'status' => 'сделано',
            ],
            [
                'version' => '0.1.8',
                'theme' => 'Персоны',
                'desc' => 'В списках персон номер телефона интер активен: если у персоны указан номер телефона, ему можно сразу позвонить в один клик.',
                'status' => 'сделано',
            ],
        ];
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        foreach (self::$versions as $item) {
            DB::table('versions')->insert([
                'version' => $item['version'],
                'theme' => $item['theme'],
                'desc' => $item['desc'],
                'status' => $item['status'],
            ]);
        }
    }
}