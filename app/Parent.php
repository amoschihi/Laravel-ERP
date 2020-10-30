<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Parent extends Model
{
    //
    protected $primaryKey = 'parent_id';

    public function applicants () 
    {
    	return $this->hasMany('App\Applicant');
    }
}
