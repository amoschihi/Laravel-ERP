<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Program extends Model
{
    //
    protected $table = 'programs';
    protected $primaryKey = 'program_id';
    protected $fillable = ['level_id','course_id','academic_id','admissiontype_id','start_date','end_date'];
}
