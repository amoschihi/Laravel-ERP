<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Status extends Model
{
    //
    protected $table = 'statuses';
    protected $primaryKey = 'status_id';
    protected $fillable = ['student_id','program_id'];
}
