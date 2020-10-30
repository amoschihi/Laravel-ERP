<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateApplicantsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('students', function (Blueprint $table) {
            $table->increments('student_id');
            $table->string('s_othernames');
            $table->string('s_surname');
            $table->char('s_gender',1);
            $table->string('s_contacts',11);
            $table->date('s_dob');
            $table->integer('s_nationalid')->unsigned();
            $table->string('s_denomination')->nullable();
            $table->string('s_admdate')->nullable();
            $table->date('s_graddate')->nullable();
            $table->text('s_homeaddress')->nullable();
            $table->string('s_district')->nullable();
            $table->string('s_area')->nullable();
            $table->string('s_country')->nullable();
            $table->string('s_photo')->nullable();
            $table->integer('parent_id')->unsigned(); //foreign key
            $table->integer('agent_id')->unsigned(); //foreign key
            $table->integer('user_id')->unsigned(); //foreign key
            $table->boolean('s_approved')->default(0);
            $table->boolean('is_classrep')->default(0);
            $table->string('s_emailaddress')->unique();
            $table->string('s_applicationno')->unique();
            $table->datetime('date_applied');
            $table->text('remarks')->nullable();
            $table->softDeletes();

            $table->foreign('parent_id')->references('parent_id')->on('parents');
            $table->foreign('agent_id')->references('id')->on('agents');
            $table->foreign('user_id')->references('id')->on('admins');
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
        Schema::dropIfExists('students');
    }
}
