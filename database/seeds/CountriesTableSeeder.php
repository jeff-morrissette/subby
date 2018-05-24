<?php

use Carbon\Carbon;
use Illuminate\Database\Seeder;

class CountriesTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('countries')->insert([
            'name' => 'Canada',
            'slug' => 'canada',
            'country_code' => 'ca',
            'created_at' => Carbon::now('America/Chicago')->format('Y-m-d H:i:s'),
            'updated_at' => Carbon::now('America/Chicago')->format('Y-m-d H:i:s'),
        ]);
    }
}
