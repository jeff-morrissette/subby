<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateSchoolsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('schools', function (Blueprint $table) {
            $table->increments('id');
            $table->unsignedInteger('school_division_id');
            $table->string('name');
            $table->string('slug')->unique();
            $table->string('address');
            $table->string('city');
            $table->unsignedInteger('province_id');
            $table->unsignedInteger('country_id');
            $table->string('postal_code');
            $table->dateTime('start_time_school');
            $table->dateTime('start_time_lunch');
            $table->dateTime('end_time_lunch');
            $table->dateTime('end_time_school');
            $table->timestamps();

            $table->foreign('province_id')->references('id')->on('provinces')->onDelete('cascade');
            $table->foreign('country_id')->references('id')->on('countries')->onDelete('cascade');
            $table->foreign('school_division_id')->references('id')->on('school_divisions')->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('schools');
    }
}
