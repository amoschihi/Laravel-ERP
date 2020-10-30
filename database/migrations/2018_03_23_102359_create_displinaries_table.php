<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateDisplinariesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('displinaries', function (Blueprint $table) {
            $table->increments('id');
            $table->string('description');
            $table->string('victim');
            $table->string('referrer');
            $table->string('action_taken');
            $table->integer('student_id')->unsigned();

            $table->foreign('student_id')->references('student_id')->on('students');
            $table->softDeletes();
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
        Schema::dropIfExists('displinaries');
    }
}
