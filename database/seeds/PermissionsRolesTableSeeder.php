<?php

use Carbon\Carbon;
use Illuminate\Database\Seeder;

class PermissionsRolesTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $permissioncount = App\Permission::all()->count();
        //$permissioncount = 32;
        for ($index = 1; $index <= $permissioncount; $index++) {
            if ($index !== 34 && $index !== 35 && $index !== 36 && $index !== 37 && $index !== 38) {
                DB::table('permissions_roles')->insert([
                    'permission_id' => $index,
                    'role_id' => 1,
                    'created_at' => Carbon::now('America/Chicago')->format('Y-m-d H:i:s'),
                    'updated_at' => Carbon::now('America/Chicago')->format('Y-m-d H:i:s'),
                ]);
            }
        }

        for ($index = 5; $index <= $permissioncount; $index++) {
            if ($index !== 6 && $index !== 7 && $index !== 9 && $index !== 33 && $index !== 35 && $index !== 36 && $index !== 37 && $index !== 38) {
                DB::table('permissions_roles')->insert([
                    'permission_id' => $index,
                    'role_id' => 2,
                    'created_at' => Carbon::now('America/Chicago')->format('Y-m-d H:i:s'),
                    'updated_at' => Carbon::now('America/Chicago')->format('Y-m-d H:i:s'),
                ]);
            };
        }

        for ($index = 11; $index <= $permissioncount; $index++) {
            if ($index !== 12 && $index !== 13 && $index !== 15 && $index !== 22 && $index !== 23 && $index !== 24 && $index !== 33 && $index !== 34 && $index !== 36 && $index !== 37 && $index !== 38) {
                DB::table('permissions_roles')->insert([
                    'permission_id' => $index,
                    'role_id' => 3,
                    'created_at' => Carbon::now('America/Chicago')->format('Y-m-d H:i:s'),
                    'updated_at' => Carbon::now('America/Chicago')->format('Y-m-d H:i:s'),
                ]);
            };
        }

        for ($index = 11; $index <= $permissioncount; $index++) {
            if ($index !== 12 && $index !== 13 && $index !== 15 && $index !== 22 && $index !== 23 && $index !== 24 && $index !== 31 && $index !== 33 && $index !== 34 && $index !== 35 && $index !== 37 && $index !== 38) {
                DB::table('permissions_roles')->insert([
                    'permission_id' => $index,
                    'role_id' => 4,
                    'created_at' => Carbon::now('America/Chicago')->format('Y-m-d H:i:s'),
                    'updated_at' => Carbon::now('America/Chicago')->format('Y-m-d H:i:s'),
                ]);
            };
        }

        DB::table('permissions_roles')->insert([
            'permission_id' => 20,
            'role_id' => 5,
            'created_at' => Carbon::now('America/Chicago')->format('Y-m-d H:i:s'),
            'updated_at' => Carbon::now('America/Chicago')->format('Y-m-d H:i:s'),
        ]);
        DB::table('permissions_roles')->insert([
            'permission_id' => 25,
            'role_id' => 5,
            'created_at' => Carbon::now('America/Chicago')->format('Y-m-d H:i:s'),
            'updated_at' => Carbon::now('America/Chicago')->format('Y-m-d H:i:s'),
        ]);
        DB::table('permissions_roles')->insert([
            'permission_id' => 26,
            'role_id' => 5,
            'created_at' => Carbon::now('America/Chicago')->format('Y-m-d H:i:s'),
            'updated_at' => Carbon::now('America/Chicago')->format('Y-m-d H:i:s'),
        ]);
        DB::table('permissions_roles')->insert([
            'permission_id' => 27,
            'role_id' => 5,
            'created_at' => Carbon::now('America/Chicago')->format('Y-m-d H:i:s'),
            'updated_at' => Carbon::now('America/Chicago')->format('Y-m-d H:i:s'),
        ]);
        DB::table('permissions_roles')->insert([
            'permission_id' => 28,
            'role_id' => 5,
            'created_at' => Carbon::now('America/Chicago')->format('Y-m-d H:i:s'),
            'updated_at' => Carbon::now('America/Chicago')->format('Y-m-d H:i:s'),
        ]);
        DB::table('permissions_roles')->insert([
            'permission_id' => 39,
            'role_id' => 5,
            'created_at' => Carbon::now('America/Chicago')->format('Y-m-d H:i:s'),
            'updated_at' => Carbon::now('America/Chicago')->format('Y-m-d H:i:s'),
        ]);
        DB::table('permissions_roles')->insert([
            'permission_id' => 23,
            'role_id' => 6,
            'created_at' => Carbon::now('America/Chicago')->format('Y-m-d H:i:s'),
            'updated_at' => Carbon::now('America/Chicago')->format('Y-m-d H:i:s'),
        ]);
        DB::table('permissions_roles')->insert([
            'permission_id' => 26,
            'role_id' => 6,
            'created_at' => Carbon::now('America/Chicago')->format('Y-m-d H:i:s'),
            'updated_at' => Carbon::now('America/Chicago')->format('Y-m-d H:i:s'),
        ]);
        DB::table('permissions_roles')->insert([
            'permission_id' => 28,
            'role_id' => 6,
            'created_at' => Carbon::now('America/Chicago')->format('Y-m-d H:i:s'),
            'updated_at' => Carbon::now('America/Chicago')->format('Y-m-d H:i:s'),
        ]);
        DB::table('permissions_roles')->insert([
            'permission_id' => 29,
            'role_id' => 5,
            'created_at' => Carbon::now('America/Chicago')->format('Y-m-d H:i:s'),
            'updated_at' => Carbon::now('America/Chicago')->format('Y-m-d H:i:s'),
        ]);
        DB::table('permissions_roles')->insert([
            'permission_id' => 30,
            'role_id' => 5,
            'created_at' => Carbon::now('America/Chicago')->format('Y-m-d H:i:s'),
            'updated_at' => Carbon::now('America/Chicago')->format('Y-m-d H:i:s'),
        ]);
        DB::table('permissions_roles')->insert([
            'permission_id' => 30,
            'role_id' => 6,
            'created_at' => Carbon::now('America/Chicago')->format('Y-m-d H:i:s'),
            'updated_at' => Carbon::now('America/Chicago')->format('Y-m-d H:i:s'),
        ]);
        DB::table('permissions_roles')->insert([
            'permission_id' => 31,
            'role_id' => 4,
            'created_at' => Carbon::now('America/Chicago')->format('Y-m-d H:i:s'),
            'updated_at' => Carbon::now('America/Chicago')->format('Y-m-d H:i:s'),
        ]);
        DB::table('permissions_roles')->insert([
            'permission_id' => 31,
            'role_id' => 5,
            'created_at' => Carbon::now('America/Chicago')->format('Y-m-d H:i:s'),
            'updated_at' => Carbon::now('America/Chicago')->format('Y-m-d H:i:s'),
        ]);
        DB::table('permissions_roles')->insert([
            'permission_id' => 31,
            'role_id' => 6,
            'created_at' => Carbon::now('America/Chicago')->format('Y-m-d H:i:s'),
            'updated_at' => Carbon::now('America/Chicago')->format('Y-m-d H:i:s'),
        ]);
        DB::table('permissions_roles')->insert([
            'permission_id' => 32,
            'role_id' => 6,
            'created_at' => Carbon::now('America/Chicago')->format('Y-m-d H:i:s'),
            'updated_at' => Carbon::now('America/Chicago')->format('Y-m-d H:i:s'),
        ]);
        DB::table('permissions_roles')->insert([
            'permission_id' => 37,
            'role_id' => 5,
            'created_at' => Carbon::now('America/Chicago')->format('Y-m-d H:i:s'),
            'updated_at' => Carbon::now('America/Chicago')->format('Y-m-d H:i:s'),
        ]);
        DB::table('permissions_roles')->insert([
            'permission_id' => 38,
            'role_id' => 6,
            'created_at' => Carbon::now('America/Chicago')->format('Y-m-d H:i:s'),
            'updated_at' => Carbon::now('America/Chicago')->format('Y-m-d H:i:s'),
        ]);
    }
}
