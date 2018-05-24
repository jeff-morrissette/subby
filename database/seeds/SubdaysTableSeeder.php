<?php

use Carbon\Carbon;
use Illuminate\Database\Seeder;

class SubdaysTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('sub_days')->insert([
            'absent_day_day_start' => Carbon::createFromDate(2018, 03, 29, 'America/Chicago')->format('Y-m-d H:i:s'),
            'absent_day_day_end' => Carbon::createFromDate(2018, 03, 29, 'America/Chicago')->format('Y-m-d H:i:s'),
            'part_of_day' => 'All day',
            'school_id' => 5,
            'school_teacher_id' => 1,
	        'substitute_teacher_id' => 1,
	        'special_requirements' => 'This is a test',
	        'sub_day_hash' => bin2hex(random_bytes(3) . date("YmdHis")),
            'accepted' => 1,
            'created_at' => Carbon::now('America/Chicago')->subDays(3)->format('Y-m-d H:i:s'),
            'updated_at' => Carbon::now('America/Chicago')->format('Y-m-d H:i:s'),
        ]);

        DB::table('sub_days')->insert([
            'absent_day_day_start' => Carbon::createFromDate(2018, 05, 9, 'America/Chicago')->format('Y-m-d H:i:s'),
            'absent_day_day_end' => Carbon::createFromDate(2018, 05, 9, 'America/Chicago')->format('Y-m-d H:i:s'),
            'part_of_day' => 'All day',
            'school_id' => 5,
            'school_teacher_id' => 1,
	        'substitute_teacher_id' => 1,
	        'special_requirements' => 'This is another test example',
	        'sub_day_hash' => bin2hex(random_bytes(3) . date("YmdHis")),
            'accepted' => 1,
            'created_at' => Carbon::now('America/Chicago')->subDays(2)->format('Y-m-d H:i:s'),
            'updated_at' => Carbon::now('America/Chicago')->format('Y-m-d H:i:s'),
        ]);

        DB::table('sub_days')->insert([
            'absent_day_day_start' => Carbon::createFromDate(2018, 05, 14, 'America/Chicago')->format('Y-m-d H:i:s'),
            'absent_day_day_end' => Carbon::createFromDate(2018, 05, 16, 'America/Chicago')->format('Y-m-d H:i:s'),
            'part_of_day' => 'All day',
            'school_id' => 5,
            'school_teacher_id' => 1,
	        'substitute_teacher_id' => 1,
	        'special_requirements' => 'This is another test',
	        'sub_day_hash' => bin2hex(random_bytes(3) . date("YmdHis")),
            'accepted' => 1,
            'created_at' => Carbon::now('America/Chicago')->subDays(1)->format('Y-m-d H:i:s'),
            'updated_at' => Carbon::now('America/Chicago')->format('Y-m-d H:i:s'),
        ]);

        DB::table('sub_days')->insert([
            'absent_day_day_start' => Carbon::createFromDate(2018, 05, 29, 'America/Chicago')->format('Y-m-d H:i:s'),
            'absent_day_day_end' => Carbon::createFromDate(2018, 05, 29, 'America/Chicago')->format('Y-m-d H:i:s'),
            'part_of_day' => 'All day',
            'school_id' => 5,
            'school_teacher_id' => 1,
            'substitute_teacher_id' => 1,
            'special_requirements' => 'Hello There.',
            'sub_day_hash' => bin2hex(random_bytes(3) . date("YmdHis")),
            'accepted' => 1,
            'created_at' => Carbon::now('America/Chicago')->format('Y-m-d H:i:s'),
            'updated_at' => Carbon::now('America/Chicago')->format('Y-m-d H:i:s'),
        ]);
    }
}
