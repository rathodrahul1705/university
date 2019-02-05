<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateAcademicDetailsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('academic_details', function (Blueprint $table) {
            $table->increments('id');
            $table->string('course_year');
            $table->string('sub_course');
            $table->string('college_name');
            $table->integer('marathi');
            $table->integer('english');
            $table->integer('biology');
            $table->integer('chemestry');
            $table->integer('mathematics');
            $table->float('percentage');
            $table->string('hsc_marksheet');
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
        Schema::dropIfExists('academic_details');
    }
}
