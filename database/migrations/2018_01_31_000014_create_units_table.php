<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateUnitsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('units', function (Blueprint $table) {
            $table->increments('unit_id');
            $table->integer('course_id')->unsigned(); //foreign key
            $table->integer('level_id')->unsigned(); //foreign key
            $table->string('unit_code');
            $table->string('unit_name');
            $table->integer('unit_hours')->unsigned();
            $table->string('unit_description')->nullable();

            $table->foreign('course_id')->references('course_id')->on('courses');
            $table->foreign('level_id')->references('level_id')->on('levels');
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
        Schema::dropIfExists('units');
    }
}
