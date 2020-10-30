<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Semester extends Model
{
    //
    protected $table = 'semesters';
    protected $primaryKey = 'id';
    protected $fillable = ['semester','s_description'];
}
