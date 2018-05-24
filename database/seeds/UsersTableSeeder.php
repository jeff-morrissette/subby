<?php

use Carbon\Carbon;
use Illuminate\Database\Seeder;

class UsersTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('users')->insert([
            'name' => 'Melanie',
            'email' => 'melanie@example.com',
            'password' => bcrypt('secret'),
            'remember_token' => str_random(15),
            'confirmed' => true,
            'created_at' => Carbon::now('America/Chicago')->format('Y-m-d H:i:s'),
            'updated_at' => Carbon::now('America/Chicago')->format('Y-m-d H:i:s'),
        ]);//1
        DB::table('users')->insert([
            'name' => 'Sally Division',
            'email' => 'schooldivisionadministrator@example.com',
            'password' => bcrypt('secret'),
            'remember_token' => str_random(15),
            'confirmed' => true,
            'created_at' => Carbon::now('America/Chicago')->format('Y-m-d H:i:s'),
            'updated_at' => Carbon::now('America/Chicago')->format('Y-m-d H:i:s'),
        ]);//2
        DB::table('users')->insert([
            'name' => 'Susan Administator',
            'email' => 'schooladministrator@example.com',
            'password' => bcrypt('secret'),
            'remember_token' => str_random(15),
            'confirmed' => true,
            'created_at' => Carbon::now('America/Chicago')->format('Y-m-d H:i:s'),
            'updated_at' => Carbon::now('America/Chicago')->format('Y-m-d H:i:s'),
        ]);//3
        DB::table('users')->insert([
            'name' => 'Paul Principal',
            'email' => 'principal@example.com',
            'password' => bcrypt('secret'),
            'remember_token' => str_random(15),
            'confirmed' => true,
            'created_at' => Carbon::now('America/Chicago')->format('Y-m-d H:i:s'),
            'updated_at' => Carbon::now('America/Chicago')->format('Y-m-d H:i:s'),
        ]);//4
        DB::table('users')->insert([
            'name' => 'Tiffany Teacher',
            'email' => 'tiffany.teacher@example.com',
            'password' => bcrypt('secret'),
            'remember_token' => str_random(15),
            'confirmed' => true,
            'created_at' => Carbon::now('America/Chicago')->format('Y-m-d H:i:s'),
            'updated_at' => Carbon::now('America/Chicago')->format('Y-m-d H:i:s'),
        ]);//5
        DB::table('users')->insert([
            'name' => 'Susan Substitute',
            'email' => 'susan.substitute@example.com',
            'password' => bcrypt('secret'),
            'remember_token' => str_random(15),
            'confirmed' => true,
            'created_at' => Carbon::now('America/Chicago')->format('Y-m-d H:i:s'),
            'updated_at' => Carbon::now('America/Chicago')->format('Y-m-d H:i:s'),
        ]);//6
        DB::table('users')->insert([
            'name' => 'Samantha Substitute',
            'email' => 'samantha.substitute@example.com',
            'password' => bcrypt('secret'),
            'remember_token' => str_random(15),
            'confirmed' => true,
            'created_at' => Carbon::now('America/Chicago')->format('Y-m-d H:i:s'),
            'updated_at' => Carbon::now('America/Chicago')->format('Y-m-d H:i:s'),
        ]);//7
        DB::table('users')->insert([
            'name' => 'Sabrina Substitute',
            'email' => 'sabrina.substitute@example.com',
            'password' => bcrypt('secret'),
            'remember_token' => str_random(15),
            'confirmed' => true,
            'created_at' => Carbon::now('America/Chicago')->format('Y-m-d H:i:s'),
            'updated_at' => Carbon::now('America/Chicago')->format('Y-m-d H:i:s'),
        ]);//8
        DB::table('users')->insert([
            'name' => 'Tabitha Teacher',
            'email' => 'tabitha.teacher@example.com',
            'password' => bcrypt('secret'),
            'remember_token' => str_random(15),
            'confirmed' => true,
            'created_at' => Carbon::now('America/Chicago')->format('Y-m-d H:i:s'),
            'updated_at' => Carbon::now('America/Chicago')->format('Y-m-d H:i:s'),
        ]);//9
        DB::table('users')->insert([
            'name' => 'Pauline Principal',
            'email' => 'pauline.principal@example.com',
            'password' => bcrypt('secret'),
            'remember_token' => str_random(15),
            'confirmed' => true,
            'created_at' => Carbon::now('America/Chicago')->format('Y-m-d H:i:s'),
            'updated_at' => Carbon::now('America/Chicago')->format('Y-m-d H:i:s'),
        ]);//10
        DB::table('users')->insert([
            'name' => 'Peter Principal',
            'email' => 'peter.principal@example.com',
            'password' => bcrypt('secret'),
            'remember_token' => str_random(15),
            'confirmed' => true,
            'created_at' => Carbon::now('America/Chicago')->format('Y-m-d H:i:s'),
            'updated_at' => Carbon::now('America/Chicago')->format('Y-m-d H:i:s'),
        ]);//11
        DB::table('users')->insert([
            'name' => 'Peyton Principal',
            'email' => 'peyton.principal@example.com',
            'password' => bcrypt('secret'),
            'remember_token' => str_random(15),
            'confirmed' => true,
            'created_at' => Carbon::now('America/Chicago')->format('Y-m-d H:i:s'),
            'updated_at' => Carbon::now('America/Chicago')->format('Y-m-d H:i:s'),
        ]);//12
        DB::table('users')->insert([
            'name' => 'Pippa Principal',
            'email' => 'pippa.principal@example.com',
            'password' => bcrypt('secret'),
            'remember_token' => str_random(15),
            'confirmed' => true,
            'created_at' => Carbon::now('America/Chicago')->format('Y-m-d H:i:s'),
            'updated_at' => Carbon::now('America/Chicago')->format('Y-m-d H:i:s'),
        ]);//13
        DB::table('users')->insert([
            'name' => 'Seth Division',
            'email' => 'seth.division@example.com',
            'password' => bcrypt('secret'),
            'remember_token' => str_random(15),
            'confirmed' => true,
            'created_at' => Carbon::now('America/Chicago')->format('Y-m-d H:i:s'),
            'updated_at' => Carbon::now('America/Chicago')->format('Y-m-d H:i:s'),
        ]);//14
        DB::table('users')->insert([
            'name' => 'Samuel Division',
            'email' => 'samuel.division@example.com',
            'password' => bcrypt('secret'),
            'remember_token' => str_random(15),
            'confirmed' => true,
            'created_at' => Carbon::now('America/Chicago')->format('Y-m-d H:i:s'),
            'updated_at' => Carbon::now('America/Chicago')->format('Y-m-d H:i:s'),
        ]);//15
    }
}
