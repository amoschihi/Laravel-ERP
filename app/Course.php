<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Course extends Model
{
    //
    protected $fillable = ['department_id','course_name','course_length','course_description'];
    protected $primaryKey = 'course_id';

    public function applicants () 
    {
    	return $this->hasMany('App\Applicant');
    }
}
