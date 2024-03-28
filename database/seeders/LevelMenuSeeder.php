<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class LevelMenuSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::insert("INSERT INTO level_menus (level_id, menu_id) VALUES
            ('1', '1'),
            ('1', '2'),
            ('1', '3'),
            ('1', '4'),
            ('1', '5'),
            ('1', '6'),
            ('1', '7'),
            ('1', '8'),
            ('1', '9'),
            ('1', '10'),
            ('1', '11'),
            ('1', '12'),
            ('1', '13'),
            ('1', '14'),
            ('1', '15'),
            ('1', '16'),
            ('1', '17'),
            ('1', '18'),
            ('1', '19'),
            ('1', '20'),
            ('1', '21'),
            ('1', '22')");
    }
}
