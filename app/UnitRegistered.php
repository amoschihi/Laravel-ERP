<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class UnitRegistered extends Model
{
    //
    protected $guarded = [];

    public function units () 
    {
    	return $this->hasMany('App\Unit','unit_id');
    }
}
