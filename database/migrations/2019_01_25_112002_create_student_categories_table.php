<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateStudentCategoriesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('student_categories', function (Blueprint $table) {
            $table->increments('id');
            // $table->string('id');
            $table->string('caste_category_status');
            $table->string('caste_category');
            $table->string('caste_certificate_data');
            $table->string('ncl_certificate_data');
            $table->string('cast_validity_certificate_data');
            $table->string('income_certificate_data');
            $table->string('Domicile_certificate_data');
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
        Schema::dropIfExists('student_categories');
    }
}
