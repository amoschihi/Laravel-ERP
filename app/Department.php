<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Department extends Model
{
    //
    protected $fillable = ['school_id','department_name'];
    protected $primaryKey = 'department_id';

    public function applicants () 
    {
    	return $this->hasMany('App\Applicant');
    }
}
