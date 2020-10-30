<?php

use Illuminate\Database\Seeder;
use App\Setting;

class SettingSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        //
        Setting::create([
            'appname'=>'Lincoln Schools',
            'content'=>'',
            'favicon'=>'',
            'notifications'=>1,
            'logo'=>''
        ]);
    }
}
