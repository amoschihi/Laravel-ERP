<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Icon extends Model
{
    //
    protected $fillable = ['icon_name', 'icon_path'];

	public function menus () 
	{
		return $this->hasMany('App\Menu');
	}

	public function submenus () 
	{
		return $this->hasMany('App\Submenu');
	}
}
