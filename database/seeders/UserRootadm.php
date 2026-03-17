<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class UserRootadm extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('users')->insert([
            'name' => 'ilya',
            'email' => 'ilya@qwerty.ru',
            'password' => '$2y$10$iq.qjubVC4U/EOkDq59XYOdN5l4SZ4dFOdqxYHzBA5EJvgv5mpjPO'
        ]);
    }
}