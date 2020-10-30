<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class AdmissionType extends Model
{
    //
    protected $fillable = ['admissiontype_name','mode_id','admissiontype_description'];
    protected $primaryKey = 'admissiontype_id';

    public function applicants () 
    {
    	return $this->hasMany('App\Applicant');
    }
}
