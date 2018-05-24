<?php

use Carbon\Carbon;
use Illuminate\Database\Seeder;

class SchoolAdministratorTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('school_administrators')->insert([
            'user_id' => 3,
            'school_id' => 5,
            'created_at' => Carbon::now('America/Chicago')->format('Y-m-d H:i:s'),
            'updated_at' => Carbon::now('America/Chicago')->format('Y-m-d H:i:s'),
        ]);
    }
}
