<?php

use Illuminate\Database\Seeder;
use App\Admin;

class AdminSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        //
        Admin::insert([
            [
                'name'=>'Amos',
                'username'=>'Amos',
                'email'=>'amoschihi@gmail.com',
                'picturefile'=>'',
                'password'=>bcrypt('lincoln'),
                'remember_token'=>str_random(10)
            ],
            [
                'name'=>'Code Doctor',
                'username'=>'Codedoctor',
                'email'=>'amoschihi@yahoo.com',
                'picturefile'=>'',
                'password'=>bcrypt('lincoln'),
                'remember_token'=>str_random(10)
            ]
        ]);
    }
}
