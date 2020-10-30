<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Transaction extends Model
{
    //
    protected $primaryKey = 'transaction_id';

    protected $fillable = [
    	'transaction_date',
    	'payment_id',
    	'user_id',
    	'student_id',
    	'fee_finance_detail_id',
    	'amount_paid',
    	'remark',
    	'description'
    ];

    public function receiptDetail() {
        return $this->hasOne('App\ReceiptDetail','transaction_id');
    }
}
