<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Displinary extends Model
{
    //
    use SoftDeletes;
    protected $dates = ['deleted_at'];
    protected $fillable = ['description', 'victim', 'referrer', 'student_id', 'action_taken'];
    public function applicants() {
    	return $this->hasMany('App\Applicant');
    }
}
