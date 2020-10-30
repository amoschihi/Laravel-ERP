<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateStatusesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('statuses', function (Blueprint $table) {
            $table->increments('status_id');
            $table->integer('student_id')->unsigned();
            $table->integer('program_id')->unsigned();
            $table->timestamps();

            $table->foreign('student_id')->references('student_id')->on('students');
            $table->foreign('program_id')->references('program_id')->on('programs');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('statuses');
    }
}
