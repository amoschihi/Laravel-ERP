<?php

use Illuminate\Database\Seeder;
use App\role;

class RoleSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        //
        role::insert([
        	['name'=>'admin', 'redirect'=>'admin/home'],
            ['name'=>'instructor', 'redirect'=>'admin'],
            ['name'=>'student', 'redirect'=>'home'],
            ['name'=>'finance', 'redirect'=>'admin/dashboard']
        ]);
    }
}
