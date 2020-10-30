<?php

use Illuminate\Database\Seeder;
use App\Submenu;

class SubmenuSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        //
        Submenu::insert([
            ['menu_name' => 'Menu Management', 'menu_id'=>3,'link' => 'admin/menu_management','position' => 1,'visible' => 1],
            ['menu_name' => 'Applicants/Admissions', 'menu_id'=>1, 'link' => 'admin/applicants','position' => 1,'visible' => 1],
            ['menu_name' => 'Classes', 'menu_id'=>1, 'link' => 'admin/academics','position' => 4,'visible' => 1],
            ['menu_name' => 'Student Base', 'menu_id'=>1, 'link' => 'admin/students','position' => 2,'visible' => 1],
            ['menu_name' => 'Settings', 'menu_id'=>3, 'link' => 'admin/settings','position' => 2,'visible' => 1],
            ['menu_name' => 'Marketers/Agents', 'menu_id'=>1,'link' => 'admin/agents','position' => 3,'visible' => 1],
            ['menu_name' => 'Fees Management', 'menu_id'=>1,'link' => 'admin/fees_management','position' => 5,'visible' => 1],
            ['menu_name' => 'Roles/Privileges', 'menu_id'=>3,'link' => 'admin/roles_privileges','position' => 3,'visible' => 1],
            ['menu_name' => 'Change Password', 'menu_id'=>2,'link' => 'admin/change_password','position' => 1,'visible' => 1],
            ['menu_name' => 'Change Password', 'menu_id'=>4,'link' => 'admin/change_password','position' => 1,'visible' => 1],
            ['menu_name' => 'Comments', 'menu_id'=>2,'link' => 'admin/comments','position' => 2,'visible' => 1],
            ['menu_name' => 'About', 'menu_id'=>2,'link' => 'admin/about','position' => 3,'visible' => 1],
            ['menu_name' => 'About', 'menu_id'=>4,'link' => 'admin/about','position' => 2,'visible' => 1],
        ]);
    }
}
