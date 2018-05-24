<?php

use Carbon\Carbon;
use Illuminate\Database\Seeder;

class ProvincesTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('provinces')->insert([
            'name' => 'Alberta',
            'slug' => 'alberta',
            'province_code' => 'ab',
            'country_id' => 1,
            'created_at' => Carbon::now('America/Chicago')->format('Y-m-d H:i:s'),
            'updated_at' => Carbon::now('America/Chicago')->format('Y-m-d H:i:s'),
        ]);
        DB::table('provinces')->insert([
            'name' => 'British Columbia',
            'slug' => 'british-columbia',
            'province_code' => 'bc',
            'country_id' => 1,
            'created_at' => Carbon::now('America/Chicago')->format('Y-m-d H:i:s'),
            'updated_at' => Carbon::now('America/Chicago')->format('Y-m-d H:i:s'),
        ]);
        DB::table('provinces')->insert([
            'name' => 'Manitoba',
            'slug' => 'manitoba',
            'province_code' => 'mb',
            'country_id' => 1,
            'created_at' => Carbon::now('America/Chicago')->format('Y-m-d H:i:s'),
            'updated_at' => Carbon::now('America/Chicago')->format('Y-m-d H:i:s'),
        ]);
        DB::table('provinces')->insert([
            'name' => 'New Brunswick',
            'slug' => 'new-brunswick',
            'province_code' => 'nb',
            'country_id' => 1,
            'created_at' => Carbon::now('America/Chicago')->format('Y-m-d H:i:s'),
            'updated_at' => Carbon::now('America/Chicago')->format('Y-m-d H:i:s'),
        ]);
        DB::table('provinces')->insert([
            'name' => 'Newfoundland and Labrador',
            'slug' => 'newfoundland-labrador',
            'province_code' => 'nl',
            'country_id' => 1,
            'created_at' => Carbon::now('America/Chicago')->format('Y-m-d H:i:s'),
            'updated_at' => Carbon::now('America/Chicago')->format('Y-m-d H:i:s'),
        ]);
        DB::table('provinces')->insert([
            'name' => 'Nova Scotia',
            'slug' => 'nova-scotia',
            'province_code' => 'ns',
            'country_id' => 1,
            'created_at' => Carbon::now('America/Chicago')->format('Y-m-d H:i:s'),
            'updated_at' => Carbon::now('America/Chicago')->format('Y-m-d H:i:s'),
        ]);
        DB::table('provinces')->insert([
            'name' => 'Northwest Territories',
            'slug' => 'northwest-territories',
            'province_code' => 'nt',
            'country_id' => 1,
            'created_at' => Carbon::now('America/Chicago')->format('Y-m-d H:i:s'),
            'updated_at' => Carbon::now('America/Chicago')->format('Y-m-d H:i:s'),
        ]);
        DB::table('provinces')->insert([
            'name' => 'Nunavut',
            'slug' => 'nunavut',
            'province_code' => 'nu',
            'country_id' => 1,
            'created_at' => Carbon::now('America/Chicago')->format('Y-m-d H:i:s'),
            'updated_at' => Carbon::now('America/Chicago')->format('Y-m-d H:i:s'),
        ]);
        DB::table('provinces')->insert([
            'name' => 'Ontario',
            'slug' => 'ontario',
            'province_code' => 'on',
            'country_id' => 1,
            'created_at' => Carbon::now('America/Chicago')->format('Y-m-d H:i:s'),
            'updated_at' => Carbon::now('America/Chicago')->format('Y-m-d H:i:s'),
        ]);
        DB::table('provinces')->insert([
            'name' => 'Prince Edward Island',
            'slug' => 'prince-edward-island',
            'province_code' => 'pe',
            'country_id' => 1,
            'created_at' => Carbon::now('America/Chicago')->format('Y-m-d H:i:s'),
            'updated_at' => Carbon::now('America/Chicago')->format('Y-m-d H:i:s'),
        ]);
        DB::table('provinces')->insert([
            'name' => 'Quebec',
            'slug' => 'quebec',
            'province_code' => 'qc',
            'country_id' => 1,
            'created_at' => Carbon::now('America/Chicago')->format('Y-m-d H:i:s'),
            'updated_at' => Carbon::now('America/Chicago')->format('Y-m-d H:i:s'),
        ]);
        DB::table('provinces')->insert([
            'name' => 'Saskatchewan',
            'slug' => 'saskatchewan',
            'province_code' => 'sk',
            'country_id' => 1,
            'created_at' => Carbon::now('America/Chicago')->format('Y-m-d H:i:s'),
            'updated_at' => Carbon::now('America/Chicago')->format('Y-m-d H:i:s'),
        ]);
        DB::table('provinces')->insert([
            'name' => 'Yukon',
            'slug' => 'yukon',
            'province_code' => 'yt',
            'country_id' => 1,
            'created_at' => Carbon::now('America/Chicago')->format('Y-m-d H:i:s'),
            'updated_at' => Carbon::now('America/Chicago')->format('Y-m-d H:i:s'),
        ]);
    }
}
