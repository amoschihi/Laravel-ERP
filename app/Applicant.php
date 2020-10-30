<?php

namespace App;

use Illuminate\Notifications\Notifiable;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Applicant extends Model
{
	use Notifiable;
    //
    use SoftDeletes;
    protected $dates = ['deleted_at'];
    protected $primaryKey = 'student_id';
    protected $table = 'students';
    protected $guarded = [];

	public function agent () 
	{
		return $this->belongsTo('App\Agent');
	}
	public function college () 
	{
		return $this->belongsTo('App\College','college_id');
	}
	public function department () 
	{
		return $this->belongsTo('App\Department','department_id');
	}
	public function academic () 
	{
		return $this->belongsTo('App\Academic','academic_id');
	}
	public function mode () 
	{
		return $this->belongsTo('App\Mode','mode_id');
	}
	public function course () 
	{
		return $this->belongsTo('App\Course','course_id');
	}
	public function parent () 
	{
		return $this->belongsTo('App\Par','parent_id');
	}
	public function admissiontype () 
	{
		return $this->belongsTo('App\AdmissionType','admissiontype_id');
	}

	public function displinary() 
	{
		return $this->belongsTo('App\Displinary');
	}

	public function level () 
	{
		return $this->belongsTo('App\Level','level_id');
	}
}
