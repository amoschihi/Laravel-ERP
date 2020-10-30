<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Agent extends Model
{
    //
    protected $fillable = ['name','contact','photo','gender','national_id','dob','location'];
    
	public function applicants () 
	{
		return $this->hasMany('App\Applicant');
	}
}
