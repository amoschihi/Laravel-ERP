<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class FeeFinanceDetails extends Model
{
    //
    protected $primaryKey = 'id';
    protected $fillable = ['mode_id','fee_detail','fee_description','level_id','fee_amount','fee_paydate','updated_by'];
}
