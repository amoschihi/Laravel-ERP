<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateFeesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('fees', function (Blueprint $table) {
            $table->increments('fee_id');
            $table->integer('student_id')->unsigned(); //foreign key
            $table->integer('academic_id')->unsigned();
            $table->integer('semester_id')->unsigned();
            $table->double('fee_outstandingbalance',8,2)->nullable();
            $table->double('fee_prepaidlastsem',8,2)->nullable();
            $table->integer('fee_no_of_units')->unsigned();
            $table->string('fee_currenttuition');
            $table->double('fee_acommodation',8,2)->nullable();
            $table->double('fee_aftercharges',8,2)->nullable();
            $table->double('fee_paid',8,2);
            $table->double('fee_helb',8,2)->nullable();
            $table->double('fee_workstudy',8,2)->nullable();
            $table->double('fee_scholarship',8,2)->nullable();
            $table->double('fee_bursary',8,2)->nullable();
            $table->double('fee_cdf',8,2)->nullable();
            $table->double('fee_prepaid',8,2)->nullable();
            $table->string('updated_by');

            $table->foreign('student_id')->references('student_id')->on('students');
            $table->foreign('academic_id')->references('academic_id')->on('academics');
            $table->foreign('semester_id')->references('id')->on('semesters');

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
        Schema::dropIfExists('fees');
    }
}
