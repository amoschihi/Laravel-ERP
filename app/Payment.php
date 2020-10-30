<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Payment extends Model
{
    //
    protected $primaryKey = 'payment_id';
    protected $fillable = ['student_id','level_id','fee_finance_detail_id','payment_date','payment_breakdown','payment_charges','payment_amount','payment_paid','amount_due'];
}
