<?php

use Illuminate\Database\Seeder;
use App\admin_role;

class AdminRolesSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        //
        admin_role::insert(array(
        	array('role_id'=>1,'admin_id'=>1),
        	array('role_id'=>2,'admin_id'=>2)
        ));
    }
}
