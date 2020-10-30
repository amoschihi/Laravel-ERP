<?php

use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $this->call(SettingSeeder::class);
        $this->call(AdminSeeder::class);
        $this->call(RoleSeeder::class);
        $this->call(AdminRolesSeeder::class);
        $this->call(MenuSeeder::class);
        $this->call(SubmenuSeeder::class);
        $this->call(MenuRoleSeeder::class);
    }
}
