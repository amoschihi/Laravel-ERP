<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateStaffTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('staff', function (Blueprint $table) {
            $table->increments('staff_id');
            $table->string('s_employee_no');
            $table->integer('department_id')->unsigned(); //foreign key
            $table->string('department_name'); 
            $table->string('s_surname'); 
            $table->string('s_othernames'); 
            $table->string('s_title'); 
            $table->integer('s_contacts')->unsigned(); 
            $table->string('picturefile'); 
            $table->string('pass_key'); 
            $table->integer('national_id')->unsigned(); 
            $table->char('s_gender',1);
            $table->string('s_dob');
            $table->string('s_marital_status');

            $table->foreign('department_id')->references('department_id')->on('departments');
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
        Schema::dropIfExists('staff');
    }
}
