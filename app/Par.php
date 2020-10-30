<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Par extends Model
{
    //
    protected $table = 'parents';
    protected $primaryKey = 'parent_id';
    protected $fillable = ['parentfullname','p_contacts'];

    public function applicants () 
    {
    	return $this->hasMany('App\Applicant');
    }
}
