<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateFeeFinanceDetailsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('fee_finance_details', function (Blueprint $table) {
            $table->increments('id');
            $table->integer('fee_id')->unsigned(); //foreign key
            $table->integer('student_id')->unsigned(); //foreign key
            $table->integer('level_id')->unsigned();
            $table->integer('mode_id')->unsigned();
            $table->string('fee_paydate');
            $table->string('fee_description')->nullable();
            $table->string('fee_detail')->nullable();
            $table->double('fee_amount',8,2);
            $table->string('updated_by');

            $table->foreign('fee_id')->references('fee_id')->on('fees');
            $table->foreign('student_id')->references('student_id')->on('students');
            $table->foreign('level_id')->references('level_id')->on('levels');
            $table->foreign('mode_id')->references('mode_id')->on('modes');

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
        Schema::dropIfExists('fee_finance_details');
    }
}
