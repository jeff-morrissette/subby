<?php

use Carbon\Carbon;
use Illuminate\Database\Seeder;

class SubstituteTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('substitute_teachers')->insert([
            'user_id' => 6,
            'address' => '160 Rochester Ave',
            'city' => 'Winnipeg',
	        'province_id' => 3,
	        'country_id' => 1,
	        'postal_code' => 'R3T 3W1',
            'phone' => '204-555-9999',
            'created_at' => Carbon::now('America/Chicago')->format('Y-m-d H:i:s'),
            'updated_at' => Carbon::now('America/Chicago')->format('Y-m-d H:i:s'),
        ]);

        DB::table('substitute_teachers')->insert([
            'user_id' => 7,
            'address' => '156 Rochester Ave',
            'city' => 'Winnipeg',
            'province_id' => 3,
            'country_id' => 1,
            'postal_code' => 'R3T 3W1',
            'phone' => '204-555-9393',
            'created_at' => Carbon::now('America/Chicago')->format('Y-m-d H:i:s'),
            'updated_at' => Carbon::now('America/Chicago')->format('Y-m-d H:i:s'),
        ]);

        DB::table('substitute_teachers')->insert([
            'user_id' => 8,
            'address' => '152 Rochester Ave',
            'city' => 'Winnipeg',
            'province_id' => 3,
            'country_id' => 1,
            'postal_code' => 'R3T 3W1',
            'phone' => '204-555-9191',
            'created_at' => Carbon::now('America/Chicago')->format('Y-m-d H:i:s'),
            'updated_at' => Carbon::now('America/Chicago')->format('Y-m-d H:i:s'),
        ]);
    }
}
