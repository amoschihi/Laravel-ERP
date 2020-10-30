<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateAdmissionTypesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('admission_types', function (Blueprint $table) {
            $table->increments('admissiontype_id');
            $table->integer('mode_id')->unsigned();
            $table->string('admissiontype_name');
            $table->string('admissiontype_description');
            $table->timestamps();

            $table->foreign('mode_id')->references('mode_id')->on('modes');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('admission_types');
    }
}
