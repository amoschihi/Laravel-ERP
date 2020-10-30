<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateTransactionsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('transactions', function (Blueprint $table) {
            $table->increments('transaction_id');
            $table->datetime('transaction_date');
            $table->integer('payment_id')->unsigned();
            $table->integer('user_id')->unsigned();
            $table->integer('student_id')->unsigned();
            $table->integer('fee_finance_detail_id')->unsigned();
            $table->string('amount_paid');
            $table->string('remark')->nullable();
            $table->string('description')->nullable();

            $table->foreign('user_id')->references('id')->on('admins');
            $table->foreign('payment_id')->references('payment_id')->on('payments');
            $table->foreign('student_id')->references('student_id')->on('students');
            $table->foreign('fee_finance_detail_id')->references('id')->on('fee_finance_details');
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
        Schema::dropIfExists('transactions');
    }
}
