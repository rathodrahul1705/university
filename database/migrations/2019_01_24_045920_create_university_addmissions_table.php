<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateUniversityAddmissionsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('university_addmissions', function (Blueprint $table) {
            $table->increments('id');
            $table->string('name');
            $table->string('name1');
            $table->string('dob');
            $table->string('gender');
            $table->integer('mobile');
            $table->integer('confirm_mobile');
            $table->string('email');
            $table->string('password');
            $table->string('c_password');
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
        Schema::dropIfExists('university_addmissions');
    }
}
