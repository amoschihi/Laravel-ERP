<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Menu extends Model
{
    //
    protected $guarded = [];
    public $timestamps = false;
    
	public function roles () 
	{
		return $this->belongsToMany('App\role','menu_roles');
	}

	public function icon () 
	{
		return $this->belongsTo('App\Icon');
	}

	public function submenus()
	{
		return $this->hasMany('App\Submenu');
	}
}
