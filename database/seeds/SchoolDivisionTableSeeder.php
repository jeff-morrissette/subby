<?php

use Carbon\Carbon;
use Illuminate\Database\Seeder;

class SchoolDivisionTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('school_divisions')->insert([
            'name' => 'Pembina Trails School Division',
            'slug' => 'pembina-trails-school-division',
            'address' => '181 Henlow Bay',
            'city' => 'Winnipeg',
	        'province_id' => 3,
	        'country_id' => 1,
	        'postal_code' => 'R3Y 1M7',
            'created_at' => Carbon::now('America/Chicago')->format('Y-m-d H:i:s'),
            'updated_at' => Carbon::now('America/Chicago')->format('Y-m-d H:i:s'),
        ]);
        DB::table('school_divisions')->insert([
            'name' => 'Louis Riel School Division',
            'slug' => 'louis-riel-school-division',
            'address' => '900 St Mary\'s Road',
            'city' => 'Winnipeg',
            'province_id' => 3,
            'country_id' => 1,
            'postal_code' => 'R2M 3R3',
            'created_at' => Carbon::now('America/Chicago')->format('Y-m-d H:i:s'),
            'updated_at' => Carbon::now('America/Chicago')->format('Y-m-d H:i:s'),
        ]);
    }
}
