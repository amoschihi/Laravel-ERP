<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreatePaymentsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('payments', function (Blueprint $table) {
            $table->increments('payment_id');
            $table->integer('student_id')->unsigned();
            $table->integer('level_id')->unsigned();
            $table->integer('fee_finance_detail_id')->unsigned();
            $table->string('payment_date');
            $table->double('payment_amount',8,2);
            $table->double('amount_due',8,2);
            $table->string('remark')->nullable();
            $table->string('description')->nullable();

            $table->foreign('level_id')->references('level_id')->on('levels');
            $table->foreign('fee_finance_detail_id')->references('id')->on('fee_finance_details');
            $table->foreign('student_id')->references('student_id')->on('students');
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
        Schema::dropIfExists('payments');
    }
}
