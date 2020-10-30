<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Unit extends Model
{
    //
    protected $primaryKey = 'unit_id';

    protected $guarded = [];
    

    public function unit () 
    {
    	return $this->belongsTo('App\UnitRegistered');
    }
    public function marks () 
    {
    	return $this->hasMany('App\Mark');
    }
}
