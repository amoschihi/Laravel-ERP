<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateLevelsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('levels', function (Blueprint $table) {
            $table->increments('level_id');
            $table->integer('year_id')->unsigned();
            $table->integer('semester_id')->unsigned();
            $table->string('level_name');
            $table->string('level_description')->nullable();
            $table->timestamps();

            $table->foreign('semester_id')->references('id')->on('semesters');
            $table->foreign('year_id')->references('id')->on('years');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('levels');
    }
}
