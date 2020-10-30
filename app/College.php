<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class College extends Model
{
    //
    protected $primaryKey = 'college_id';
    protected $fillable = ['college_name','college_location'];

    public function applicants () 
    {
    	return $this->hasMany('App\Applicant');
    }
}
