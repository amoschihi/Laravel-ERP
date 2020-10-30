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
        	['name'=>'admin'],
            ['name'=>'instructor'],
            ['name'=>'student'],
            ['name'=>'finance']
        ]);
    }
}
