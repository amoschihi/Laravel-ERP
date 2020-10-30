<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateProgramsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('programs', function (Blueprint $table) {
            $table->increments('program_id');
            $table->integer('academic_id')->unsigned();
            $table->integer('level_id')->unsigned();
            $table->integer('course_id')->unsigned();
            $table->integer('admissiontype_id')->unsigned();
            $table->date('start_date');
            $table->date('end_date');
            $table->timestamps();

            $table->foreign('academic_id')->references('academic_id')->on('academics');
            $table->foreign('level_id')->references('level_id')->on('levels');
            $table->foreign('course_id')->references('course_id')->on('courses');
            $table->foreign('admissiontype_id')->references('admissiontype_id')->on('admission_types');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('programs');
    }
}
