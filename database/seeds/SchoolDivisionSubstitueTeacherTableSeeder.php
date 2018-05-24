<?php

use Carbon\Carbon;
use Illuminate\Database\Seeder;

class SchoolDivisionSubstitueTeacherTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('schooldivision_substituteteacher')->insert([
            'school_division_id' => 1,
            'substitute_teacher_id' => 1,
            'created_at' => Carbon::now('America/Chicago')->format('Y-m-d H:i:s'),
            'updated_at' => Carbon::now('America/Chicago')->format('Y-m-d H:i:s'),
        ]);

        DB::table('schooldivision_substituteteacher')->insert([
            'school_division_id' => 1,
            'substitute_teacher_id' => 2,
            'created_at' => Carbon::now('America/Chicago')->format('Y-m-d H:i:s'),
            'updated_at' => Carbon::now('America/Chicago')->format('Y-m-d H:i:s'),
        ]);

        DB::table('schooldivision_substituteteacher')->insert([
            'school_division_id' => 1,
            'substitute_teacher_id' => 3,
            'created_at' => Carbon::now('America/Chicago')->format('Y-m-d H:i:s'),
            'updated_at' => Carbon::now('America/Chicago')->format('Y-m-d H:i:s'),
        ]);

        DB::table('schooldivision_substituteteacher')->insert([
            'school_division_id' => 2,
            'substitute_teacher_id' => 2,
            'created_at' => Carbon::now('America/Chicago')->format('Y-m-d H:i:s'),
            'updated_at' => Carbon::now('America/Chicago')->format('Y-m-d H:i:s'),
        ]);
    }
}
