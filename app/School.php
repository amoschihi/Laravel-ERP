<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class School extends Model
{
    //
    protected $fillable = ['college_id','school_name','school_director'];
    protected $primaryKey = 'school_id';
}
