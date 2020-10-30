<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Comment extends Model
{
    //
    protected $primaryKey = 'comment_id';
    protected $fillable = ['subject','body','admin_id','user_id'];
}
