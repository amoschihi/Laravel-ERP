<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Academic extends Model
{
    //
    protected $primaryKey = 'academic_id';
    protected $fillable = ['academic_name'];

    public function applicants () 
    {
    	return $this->hasMany('App\Applicant');
    }
}
