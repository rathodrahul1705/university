<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class AddAcademicDetailsId extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('personal_details', function (Blueprint $table) {
            $table->integer('academic_details_id')->unsigned();
            $table->foreign('academic_details_id')->references('id')->on('academic_details');

        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('personal_details', function (Blueprint $table) {
           $table->dropColumn('academic_details_id')->unsigned();
            $table->dropForeign('academic_details_id_foreign');

        });
    }
}
