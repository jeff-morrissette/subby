<?php

use Carbon\Carbon;
use Illuminate\Database\Seeder;

class SchoolDivisionAdministratorTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('school_division_administrators')->insert([
            'user_id' => 2,
            'school_division_id' => 1,
            'created_at' => Carbon::now('America/Chicago')->format('Y-m-d H:i:s'),
            'updated_at' => Carbon::now('America/Chicago')->format('Y-m-d H:i:s'),
        ]);
        DB::table('school_division_administrators')->insert([
            'user_id' => 14,
            'school_division_id' => 2,
            'created_at' => Carbon::now('America/Chicago')->format('Y-m-d H:i:s'),
            'updated_at' => Carbon::now('America/Chicago')->format('Y-m-d H:i:s'),
        ]);
        DB::table('school_division_administrators')->insert([
            'user_id' => 15,
            'school_division_id' => 1,
            'created_at' => Carbon::now('America/Chicago')->format('Y-m-d H:i:s'),
            'updated_at' => Carbon::now('America/Chicago')->format('Y-m-d H:i:s'),
        ]);
    }
}
