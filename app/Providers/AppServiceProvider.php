<?php

namespace App\Providers;

use App\Menu;
use App\Setting;
use App\Submenu;
use Illuminate\Support\Facades\Schema;
use Illuminate\Support\Facades\View;
use Illuminate\Support\ServiceProvider;
use Auth;

class AppServiceProvider extends ServiceProvider
{
    /**
     * Bootstrap any application services.
     *
     * @return void
     */
    public function boot()
    {
        //
        self::globalVals(1);
        Schema::defaultStringLength(191);
    }

    /**
     * Register any application services.
     *
     * @return void
     */
    public function register()
    {
        //
    }

    /**
     * Share variables to all views
     *
     * @return var
     */
    public static function globalVals($var)
    {
        View::share('app',Setting::findOrFail($var));
        View::share('adminMenus',Menu::whereHas('roles',function($query) { $query->where(['name'=>'admin','visible'=>1]); })->orderBy('position')->get());
        View::share('instructorMenus',Menu::whereHas('roles',function($query) { $query->where(['name'=>'instructor','visible'=>1]); })->orderBy('position')->get());
        View::share('financeMenus',Menu::whereHas('roles',function($query) { $query->where(['name'=>'finance','visible'=>1]); })->orderBy('position')->get());
        View::share('studentMenus',Menu::whereHas('roles',function($query) { $query->where(['name'=>'student','visible'=>1]); })->orderBy('position')->get());
        View::share('submenus',Submenu::where('visible',1)->orderBy('position')->get());
    }
}
