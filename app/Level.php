<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Level extends Model
{
    //
    protected $primaryKey = 'level_id';
    protected $fillable = ['semester_id','year_id','level_name','level_description'];

    public function applicants () 
    {
    	return $this->hasMany('App\Applicant');
    }
}
