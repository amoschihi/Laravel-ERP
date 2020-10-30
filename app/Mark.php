<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Mark extends Model
{
    //
    protected $guarded = [];

    public function unit () 
    {
    	return $this->belongsTo('App\Unit','unit_id');
    }
}
