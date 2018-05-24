<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateSubDaysTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('sub_days', function (Blueprint $table) {
            $table->increments('id');
            $table->dateTime('absent_day_day_start');
            $table->dateTime('absent_day_day_end');
            $table->string('part_of_day');
            $table->unsignedInteger('school_id');
            $table->unsignedInteger('school_teacher_id');
            $table->unsignedInteger('substitute_teacher_id');
            $table->text('special_requirements');
            $table->unsignedInteger('accepted')->default(0); 
            // accepted values: 0 - pending | 1 - accepted | 2 - declined
            $table->string('sub_day_hash')->unique();
            $table->timestamps();

            $table->foreign('school_id')->references('id')->on('schools')->onDelete('cascade');
            $table->foreign('school_teacher_id')->references('id')->on('school_teachers')->onDelete('cascade');
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
        Schema::dropIfExists('sub_days');
    }
}
