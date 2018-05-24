<?php

use Carbon\Carbon;
use Illuminate\Database\Seeder;

class RolesTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('roles')->insert([
            'name' => 'Super Administrator',
            'slug' => 'super_administrator',
            'created_at' => Carbon::now('America/Chicago')->format('Y-m-d H:i:s'),
            'updated_at' => Carbon::now('America/Chicago')->format('Y-m-d H:i:s'),
        ]);//1
        DB::table('roles')->insert([
            'name' => 'School Division Administrator',
            'slug' => 'school_division_administrator',
            'created_at' => Carbon::now('America/Chicago')->format('Y-m-d H:i:s'),
            'updated_at' => Carbon::now('America/Chicago')->format('Y-m-d H:i:s'),
        ]);//2
        DB::table('roles')->insert([
            'name' => 'School Administrator',
            'slug' => 'school_administrator',
            'created_at' => Carbon::now('America/Chicago')->format('Y-m-d H:i:s'),
            'updated_at' => Carbon::now('America/Chicago')->format('Y-m-d H:i:s'),
        ]);//3
        DB::table('roles')->insert([
            'name' => 'School Principal',
            'slug' => 'school_principal',
            'created_at' => Carbon::now('America/Chicago')->format('Y-m-d H:i:s'),
            'updated_at' => Carbon::now('America/Chicago')->format('Y-m-d H:i:s'),
        ]);//4
        DB::table('roles')->insert([
            'name' => 'School Teacher',
            'slug' => 'school_teacher',
            'created_at' => Carbon::now('America/Chicago')->format('Y-m-d H:i:s'),
            'updated_at' => Carbon::now('America/Chicago')->format('Y-m-d H:i:s'),
        ]);//5
        DB::table('roles')->insert([
            'name' => 'Substitute Teacher',
            'slug' => 'substitute_teacher',
            'created_at' => Carbon::now('America/Chicago')->format('Y-m-d H:i:s'),
            'updated_at' => Carbon::now('America/Chicago')->format('Y-m-d H:i:s'),
        ]);//6
    }
}
