<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Mode extends Model
{
    //
    protected $fillable = ['mode_name'];
    protected $primaryKey = 'mode_id';

    public function applicants () 
    {
    	return $this->hasMany('App\Applicant');
    }
}
