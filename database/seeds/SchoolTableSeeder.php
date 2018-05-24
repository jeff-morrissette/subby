<?php

use Carbon\Carbon;
use Illuminate\Database\Seeder;

class SchoolTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('schools')->insert([
            'school_division_id' => 1,
            'name' => 'Acadia School',
            'slug' => 'acadia-school',
            'address' => '175 Killarney Avenue',
            'city' => 'Winnipeg',
	        'province_id' => 3,
	        'country_id' => 1,
	        'postal_code' => 'R3T 3B3',
	        'start_time_school' => Carbon::createFromTime(8, 35, 0, 'America/Chicago')->format('Y-m-d H:i:s'),
            'start_time_lunch' => Carbon::createFromTime(12, 00, 0, 'America/Chicago')->format('Y-m-d H:i:s'),
            'end_time_lunch' => Carbon::createFromTime(13, 00, 0, 'America/Chicago')->format('Y-m-d H:i:s'),
            'end_time_school' => Carbon::createFromTime(15, 20, 0, 'America/Chicago')->format('Y-m-d H:i:s'),
            'created_at' => Carbon::now('America/Chicago')->format('Y-m-d H:i:s'),
            'updated_at' => Carbon::now('America/Chicago')->format('Y-m-d H:i:s'),
        ]);//1

        DB::table('schools')->insert([
            'school_division_id' => 1,
            'name' => 'Arthur A. Leach Junior High',
            'slug' => 'arthur-a-leach-junior-high',
            'address' => '1827 Chancellor Drive',
            'city' => 'Winnipeg',
	        'province_id' => 3,
	        'country_id' => 1,
	        'postal_code' => 'R3T 4C4',
	        'start_time_school' => Carbon::createFromTime(8, 35, 0, 'America/Chicago')->format('Y-m-d H:i:s'),
            'start_time_lunch' => Carbon::createFromTime(12, 00, 0, 'America/Chicago')->format('Y-m-d H:i:s'),
            'end_time_lunch' => Carbon::createFromTime(13, 00, 0, 'America/Chicago')->format('Y-m-d H:i:s'),
            'end_time_school' => Carbon::createFromTime(15, 20, 0, 'America/Chicago')->format('Y-m-d H:i:s'),
            'created_at' => Carbon::now('America/Chicago')->format('Y-m-d H:i:s'),
            'updated_at' => Carbon::now('America/Chicago')->format('Y-m-d H:i:s'),
        ]);//2

        DB::table('schools')->insert([
            'school_division_id' => 1,
            'name' => 'Bairdmore School',
            'slug' => 'bairdmore-school',
            'address' => '700 Bairdmore Boulevard',
            'city' => 'Winnipeg',
	        'province_id' => 3,
	        'country_id' => 1,
	        'postal_code' => 'R3T 5R3',
	        'start_time_school' => Carbon::createFromTime(8, 35, 0, 'America/Chicago')->format('Y-m-d H:i:s'),
            'start_time_lunch' => Carbon::createFromTime(12, 00, 0, 'America/Chicago')->format('Y-m-d H:i:s'),
            'end_time_lunch' => Carbon::createFromTime(13, 00, 0, 'America/Chicago')->format('Y-m-d H:i:s'),
            'end_time_school' => Carbon::createFromTime(15, 20, 0, 'America/Chicago')->format('Y-m-d H:i:s'),
            'created_at' => Carbon::now('America/Chicago')->format('Y-m-d H:i:s'),
            'updated_at' => Carbon::now('America/Chicago')->format('Y-m-d H:i:s'),
        ]);//3

        DB::table('schools')->insert([
            'school_division_id' => 1,
            'name' => 'Beaumont School',
            'slug' => 'beaumont-school',
            'address' => '5880 Betsworth Avenue',
            'city' => 'Winnipeg',
	        'province_id' => 3,
	        'country_id' => 1,
	        'postal_code' => 'R3R 0J7',
	        'start_time_school' => Carbon::createFromTime(8, 35, 0, 'America/Chicago')->format('Y-m-d H:i:s'),
            'start_time_lunch' => Carbon::createFromTime(12, 00, 0, 'America/Chicago')->format('Y-m-d H:i:s'),
            'end_time_lunch' => Carbon::createFromTime(13, 00, 0, 'America/Chicago')->format('Y-m-d H:i:s'),
            'end_time_school' => Carbon::createFromTime(15, 20, 0, 'America/Chicago')->format('Y-m-d H:i:s'),
            'created_at' => Carbon::now('America/Chicago')->format('Y-m-d H:i:s'),
            'updated_at' => Carbon::now('America/Chicago')->format('Y-m-d H:i:s'),
        ]);//4

        DB::table('schools')->insert([
            'school_division_id' => 1,
            'name' => 'Ryerson Elementary',
            'slug' => 'ryerson-elementary',
            'address' => '10 Ryerson Avenue',
            'city' => 'Winnipeg',
	        'province_id' => 3,
	        'country_id' => 1,
	        'postal_code' => 'R3T 3P9',
	        'start_time_school' => Carbon::createFromTime(8, 35, 0, 'America/Chicago')->format('Y-m-d H:i:s'),
            'start_time_lunch' => Carbon::createFromTime(12, 00, 0, 'America/Chicago')->format('Y-m-d H:i:s'),
            'end_time_lunch' => Carbon::createFromTime(13, 00, 0, 'America/Chicago')->format('Y-m-d H:i:s'),
            'end_time_school' => Carbon::createFromTime(15, 20, 0, 'America/Chicago')->format('Y-m-d H:i:s'),
            'created_at' => Carbon::now('America/Chicago')->format('Y-m-d H:i:s'),
            'updated_at' => Carbon::now('America/Chicago')->format('Y-m-d H:i:s'),
        ]);
    }
}
