<?php

use Illuminate\Database\Seeder;
use App\Menu;

class MenuSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        //
        Menu::insert([
            ['menu_name' => 'Browse Categories','position' => 1,'visible' => 1],
            ['menu_name' => 'User Options','position' => 2,'visible' => 1],
            ['menu_name' => 'Management','position' => 1,'visible' => 1],
            ['menu_name' => 'Version','position' => 2,'visible' => 1],
        ]);
    }
}
