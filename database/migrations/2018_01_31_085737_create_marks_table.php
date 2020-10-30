<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateMarksTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('marks', function (Blueprint $table) {
            $table->increments('id');
            $table->integer('student_id')->unsigned(); //foreign key
            $table->boolean('rep_status')->default(0);
            $table->integer('unit_id')->unsigned(); //foreign key
            $table->string('academic_id')->unsigned(); //foreign key
            $table->string('level_id')->unsigned(); //foreign key
            $table->integer('m_assignment')->unsigned()->nullable();
            $table->boolean('m_assignmentmissing');
            $table->integer('m_cat')->unsigned()->nullable();
            $table->boolean('m_catmissing');
            $table->integer('m_exam')->unsigned()->nullable();
            $table->boolean('m_exammissing');
            $table->integer('m_total_marks')->unsigned();
            $table->char('m_grade',1);
            $table->integer('m_gp')->unsigned();
            $table->integer('m_term_hours')->unsigned()->nullable();
            $table->string('updated_by')->nullable();

            $table->foreign('unit_id')->references('unit_id')->on('units');
            $table->foreign('academic_id')->references('academic_id')->on('academics');
            $table->foreign('level_id')->references('level_id')->on('levels');
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
        Schema::dropIfExists('marks');
    }
}
