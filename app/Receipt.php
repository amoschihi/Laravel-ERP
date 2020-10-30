<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Receipt extends Model
{
    //
    protected $fillable = ['receipt_id'];

    static public function autoNumber() {
    	$id = 0;
    	$receipt_id = Receipt::max('receipt_id');
    	if($receipt_id!=0) {
    		$id = $receipt_id+1;
    		Receipt::insert(['receipt_id'=>$id]);
    	}else {
    		$id = 1;
    		Receipt::insert(['receipt_id'=>$id]);
    	}
    	return $id;
    }
}
