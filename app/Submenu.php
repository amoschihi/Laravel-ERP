<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Submenu extends Model
{
    //
    protected $guarded = [];
    public $timestamps = false;

    public function icon () 
	{
		return $this->belongsTo('App\Icon');
	}

	public function menu()
	{
		return $this->belongsTo('App\Menu');
	}
}
