<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateReceiptDetailsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('receipt_details', function (Blueprint $table) {
            $table->increments('id');
            $table->integer('receipt_id')->unsigned();
            $table->integer('student_id')->unsigned();
            $table->integer('transaction_id')->unsigned();

            $table->foreign('receipt_id')->references('id')->on('receipts');
            $table->foreign('student_id')->references('student_id')->on('students');
            $table->foreign('transaction_id')->references('transaction_id')->on('transactions');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('receipt_details');
    }
}
