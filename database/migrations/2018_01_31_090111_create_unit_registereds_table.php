<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateUnitRegisteredsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('unit_registereds', function (Blueprint $table) {
            $table->increments('id');
            $table->integer('student_id')->unsigned();
            $table->integer('unit_id')->unsigned();
            $table->integer('academic_id')->unsigned();
            $table->integer('lecturer_id')->unsigned()->nullable(); //foreign key
            $table->integer('term_id')->unsigned()->nullable(); //foreign key
            $table->integer('level_id')->unsigned(); //foreign key
            $table->integer('course_id')->unsigned(); //foreign key
            $table->integer('college_id')->unsigned(); //foreign key
            $table->integer('mode_id')->unsigned()->nullable();
            $table->double('u_cost',8,2)->nullable();
            $table->string('updated_by')->nullable();

            $table->foreign('lecturer_id')->references('lecturer_id')->on('lecturers');
            $table->foreign('level_id')->references('level_id')->on('levels');
            $table->foreign('term_id')->references('term_id')->on('terms');
            $table->foreign('course_id')->references('course_id')->on('courses');
            $table->foreign('college_id')->references('college_id')->on('colleges');
            $table->foreign('student_id')->references('student_id')->on('students');
            $table->foreign('academic_id')->references('academic_id')->on('academics');
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
        Schema::dropIfExists('unit_registereds');
    }
}
