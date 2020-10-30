<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class role extends Model
{
    public $timestamps = false;
    //
    /**
     * The admins that belong to the role.
     */
    public function admins()
    {
        return $this->belongsToMany('App\Admin');
    }

	public function menus () 
	{
		return $this->belongsToMany('App\Menu','menu_roles');
	}
}
