<?php

use Carbon\Carbon;
use Illuminate\Database\Seeder;

class TeacherTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('school_teachers')->insert([
            'user_id' => 5,
            'school_id' => 5,
            'parking_stall' => '1A',
            'classroom' => '1T',
            'grade' => 1,
            'created_at' => Carbon::now('America/Chicago')->format('Y-m-d H:i:s'),
            'updated_at' => Carbon::now('America/Chicago')->format('Y-m-d H:i:s'),
        ]);
        DB::table('school_teachers')->insert([
            'user_id' => 9,
            'school_id' => 4,
            'parking_stall' => '1A',
            'classroom' => '5T',
            'grade' => 5,
            'created_at' => Carbon::now('America/Chicago')->format('Y-m-d H:i:s'),
            'updated_at' => Carbon::now('America/Chicago')->format('Y-m-d H:i:s'),
        ]);
    }
}
