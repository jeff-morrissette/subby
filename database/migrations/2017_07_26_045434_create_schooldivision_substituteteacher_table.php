<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateSchooldivisionSubstituteteacherTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('schooldivision_substituteteacher', function (Blueprint $table) {
            $table->unsignedInteger('school_division_id');
            $table->unsignedInteger('substitute_teacher_id');
            $table->timestamps();

            $table->foreign('school_division_id')->references('id')->on('school_divisions')->onDelete('cascade');
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
        Schema::dropIfExists('schooldivision_substituteteacher');
    }
}
