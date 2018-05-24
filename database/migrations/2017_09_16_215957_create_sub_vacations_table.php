<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateSubVacationsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('sub_vacations', function (Blueprint $table) {
            $table->increments('id');
            $table->unsignedInteger('substitute_teacher_id');
            $table->dateTime('vacation_day');
            $table->timestamps();

            $table->foreign('substitute_teacher_id')->references('id')->on('substitute_teachers')->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('sub_vacations');
    }
}
