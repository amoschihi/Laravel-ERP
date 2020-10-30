<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class ReceiptDetail extends Model
{
    //
    protected $fillable = ['student_id','payment_id','receipt_id','transaction_id'];

    public function transaction() {
    	return $this->belongsTo('App\Transaction');
    }
}
