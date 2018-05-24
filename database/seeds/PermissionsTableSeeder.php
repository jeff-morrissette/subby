<?php

use Carbon\Carbon;
use Illuminate\Database\Seeder;

class PermissionsTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('permissions')->insert([
            'name' => 'Create Permission',
            'slug' => 'create_permission',
            'created_at' => Carbon::now('America/Chicago')->format('Y-m-d H:i:s'),
            'updated_at' => Carbon::now('America/Chicago')->format('Y-m-d H:i:s'),
        ]);//1
        DB::table('permissions')->insert([
            'name' => 'Update Permission',
            'slug' => 'update_permission',
            'created_at' => Carbon::now('America/Chicago')->format('Y-m-d H:i:s'),
            'updated_at' => Carbon::now('America/Chicago')->format('Y-m-d H:i:s'),
        ]);//2
        DB::table('permissions')->insert([
            'name' => 'Delete Permission',
            'slug' => 'delete_permission',
            'created_at' => Carbon::now('America/Chicago')->format('Y-m-d H:i:s'),
            'updated_at' => Carbon::now('America/Chicago')->format('Y-m-d H:i:s'),
        ]);//3
        DB::table('permissions')->insert([
            'name' => 'Create School Division',
            'slug' => 'create_school_division',
            'created_at' => Carbon::now('America/Chicago')->format('Y-m-d H:i:s'),
            'updated_at' => Carbon::now('America/Chicago')->format('Y-m-d H:i:s'),
        ]);//4
        DB::table('permissions')->insert([
            'name' => 'Update School Division',
            'slug' => 'update_school_division',
            'created_at' => Carbon::now('America/Chicago')->format('Y-m-d H:i:s'),
            'updated_at' => Carbon::now('America/Chicago')->format('Y-m-d H:i:s'),
        ]);//5
        DB::table('permissions')->insert([
            'name' => 'Delete School Division',
            'slug' => 'delete_school_division',
            'created_at' => Carbon::now('America/Chicago')->format('Y-m-d H:i:s'),
            'updated_at' => Carbon::now('America/Chicago')->format('Y-m-d H:i:s'),
        ]);//6
        DB::table('permissions')->insert([
            'name' => 'Create School Division Administrator',
            'slug' => 'create_school_division_administrator',
            'created_at' => Carbon::now('America/Chicago')->format('Y-m-d H:i:s'),
            'updated_at' => Carbon::now('America/Chicago')->format('Y-m-d H:i:s'),
        ]);//7
        DB::table('permissions')->insert([
            'name' => 'Update School Division Administrator',
            'slug' => 'update_school_division_administrator',
            'created_at' => Carbon::now('America/Chicago')->format('Y-m-d H:i:s'),
            'updated_at' => Carbon::now('America/Chicago')->format('Y-m-d H:i:s'),
        ]);//8
        DB::table('permissions')->insert([
            'name' => 'Delete School Division Administrator',
            'slug' => 'delete_school_division_administrator',
            'created_at' => Carbon::now('America/Chicago')->format('Y-m-d H:i:s'),
            'updated_at' => Carbon::now('America/Chicago')->format('Y-m-d H:i:s'),
        ]);//9
        DB::table('permissions')->insert([
            'name' => 'Create School',
            'slug' => 'create_school',
            'created_at' => Carbon::now('America/Chicago')->format('Y-m-d H:i:s'),
            'updated_at' => Carbon::now('America/Chicago')->format('Y-m-d H:i:s'),
        ]);//10
        DB::table('permissions')->insert([
            'name' => 'Update School',
            'slug' => 'update_school',
            'created_at' => Carbon::now('America/Chicago')->format('Y-m-d H:i:s'),
            'updated_at' => Carbon::now('America/Chicago')->format('Y-m-d H:i:s'),
        ]);//11
        DB::table('permissions')->insert([
            'name' => 'Delete School',
            'slug' => 'delete_school',
            'created_at' => Carbon::now('America/Chicago')->format('Y-m-d H:i:s'),
            'updated_at' => Carbon::now('America/Chicago')->format('Y-m-d H:i:s'),
        ]);//12
        DB::table('permissions')->insert([
            'name' => 'Create Principal',
            'slug' => 'create_principal',
            'created_at' => Carbon::now('America/Chicago')->format('Y-m-d H:i:s'),
            'updated_at' => Carbon::now('America/Chicago')->format('Y-m-d H:i:s'),
        ]);//13
        DB::table('permissions')->insert([
            'name' => 'Update Principal',
            'slug' => 'update_principal',
            'created_at' => Carbon::now('America/Chicago')->format('Y-m-d H:i:s'),
            'updated_at' => Carbon::now('America/Chicago')->format('Y-m-d H:i:s'),
        ]);//14
        DB::table('permissions')->insert([
            'name' => 'Delete Principal',
            'slug' => 'delete_principal',
            'created_at' => Carbon::now('America/Chicago')->format('Y-m-d H:i:s'),
            'updated_at' => Carbon::now('America/Chicago')->format('Y-m-d H:i:s'),
        ]);//15
        DB::table('permissions')->insert([
            'name' => 'Create School Administrator',
            'slug' => 'create_school_administrator',
            'created_at' => Carbon::now('America/Chicago')->format('Y-m-d H:i:s'),
            'updated_at' => Carbon::now('America/Chicago')->format('Y-m-d H:i:s'),
        ]);//16
        DB::table('permissions')->insert([
            'name' => 'Update School Administrator',
            'slug' => 'update_school_administrator',
            'created_at' => Carbon::now('America/Chicago')->format('Y-m-d H:i:s'),
            'updated_at' => Carbon::now('America/Chicago')->format('Y-m-d H:i:s'),
        ]);//17
        DB::table('permissions')->insert([
            'name' => 'Delete School Administrator',
            'slug' => 'delete_school_administrator',
            'created_at' => Carbon::now('America/Chicago')->format('Y-m-d H:i:s'),
            'updated_at' => Carbon::now('America/Chicago')->format('Y-m-d H:i:s'),
        ]);//18
        DB::table('permissions')->insert([
            'name' => 'Create School Teacher',
            'slug' => 'create_school_teacher',
            'created_at' => Carbon::now('America/Chicago')->format('Y-m-d H:i:s'),
            'updated_at' => Carbon::now('America/Chicago')->format('Y-m-d H:i:s'),
        ]);//19
        DB::table('permissions')->insert([
            'name' => 'Update School Teacher',
            'slug' => 'update_school_teacher',
            'created_at' => Carbon::now('America/Chicago')->format('Y-m-d H:i:s'),
            'updated_at' => Carbon::now('America/Chicago')->format('Y-m-d H:i:s'),
        ]);//20
        DB::table('permissions')->insert([
            'name' => 'Delete School Teacher',
            'slug' => 'delete_school_teacher',
            'created_at' => Carbon::now('America/Chicago')->format('Y-m-d H:i:s'),
            'updated_at' => Carbon::now('America/Chicago')->format('Y-m-d H:i:s'),
        ]);//21
        DB::table('permissions')->insert([
            'name' => 'Create Substitute Teacher',
            'slug' => 'create_substitute_teacher',
            'created_at' => Carbon::now('America/Chicago')->format('Y-m-d H:i:s'),
            'updated_at' => Carbon::now('America/Chicago')->format('Y-m-d H:i:s'),
        ]);//22
        DB::table('permissions')->insert([
            'name' => 'Update Substitute Teacher',
            'slug' => 'update_substitute_teacher',
            'created_at' => Carbon::now('America/Chicago')->format('Y-m-d H:i:s'),
            'updated_at' => Carbon::now('America/Chicago')->format('Y-m-d H:i:s'),
        ]);//23
        DB::table('permissions')->insert([
            'name' => 'Delete Substitute Teacher',
            'slug' => 'delete_substitute_teacher',
            'created_at' => Carbon::now('America/Chicago')->format('Y-m-d H:i:s'),
            'updated_at' => Carbon::now('America/Chicago')->format('Y-m-d H:i:s'),
        ]);//24
        DB::table('permissions')->insert([
            'name' => 'Create Substitute Day',
            'slug' => 'create_substitute_day',
            'created_at' => Carbon::now('America/Chicago')->format('Y-m-d H:i:s'),
            'updated_at' => Carbon::now('America/Chicago')->format('Y-m-d H:i:s'),
        ]);//25
        DB::table('permissions')->insert([
            'name' => 'Update Substitute Day',
            'slug' => 'update_substitute_day',
            'created_at' => Carbon::now('America/Chicago')->format('Y-m-d H:i:s'),
            'updated_at' => Carbon::now('America/Chicago')->format('Y-m-d H:i:s'),
        ]);//26
        DB::table('permissions')->insert([
            'name' => 'Delete Substitute Day',
            'slug' => 'delete_substitute_day',
            'created_at' => Carbon::now('America/Chicago')->format('Y-m-d H:i:s'),
            'updated_at' => Carbon::now('America/Chicago')->format('Y-m-d H:i:s'),
        ]);//27
        DB::table('permissions')->insert([
            'name' => 'View Substitute Day',
            'slug' => 'view_substitute_day',
            'created_at' => Carbon::now('America/Chicago')->format('Y-m-d H:i:s'),
            'updated_at' => Carbon::now('America/Chicago')->format('Y-m-d H:i:s'),
        ]);//28
        DB::table('permissions')->insert([
            'name' => 'Create Substitute Task',
            'slug' => 'create_substitute_task',
            'created_at' => Carbon::now('America/Chicago')->format('Y-m-d H:i:s'),
            'updated_at' => Carbon::now('America/Chicago')->format('Y-m-d H:i:s'),
        ]);//29
        DB::table('permissions')->insert([
            'name' => 'Update Substitute Task',
            'slug' => 'update_substitute_task',
            'created_at' => Carbon::now('America/Chicago')->format('Y-m-d H:i:s'),
            'updated_at' => Carbon::now('America/Chicago')->format('Y-m-d H:i:s'),
        ]);//30
        DB::table('permissions')->insert([
            'name' => 'View Substitute Task',
            'slug' => 'view_substitute_task',
            'created_at' => Carbon::now('America/Chicago')->format('Y-m-d H:i:s'),
            'updated_at' => Carbon::now('America/Chicago')->format('Y-m-d H:i:s'),
        ]);//31
        DB::table('permissions')->insert([
            'name' => 'Create Substitute Teacher Vacation Day',
            'slug' => 'create_substitute_teacher_vacation_day',
            'created_at' => Carbon::now('America/Chicago')->format('Y-m-d H:i:s'),
            'updated_at' => Carbon::now('America/Chicago')->format('Y-m-d H:i:s'),
        ]);//32
        DB::table('permissions')->insert([
            'name' => 'View Super Administrator Dashboard',
            'slug' => 'view-super_administrator-dashboard',
            'created_at' => Carbon::now('America/Chicago')->format('Y-m-d H:i:s'),
            'updated_at' => Carbon::now('America/Chicago')->format('Y-m-d H:i:s'),
        ]);//33
        DB::table('permissions')->insert([
            'name' => 'View School Division Administrator Dashboard',
            'slug' => 'view-school_division_administrator-dashboard',
            'created_at' => Carbon::now('America/Chicago')->format('Y-m-d H:i:s'),
            'updated_at' => Carbon::now('America/Chicago')->format('Y-m-d H:i:s'),
        ]);//34
        DB::table('permissions')->insert([
            'name' => 'View School Administrator Dashboard',
            'slug' => 'view-school_administrator-dashboard',
            'created_at' => Carbon::now('America/Chicago')->format('Y-m-d H:i:s'),
            'updated_at' => Carbon::now('America/Chicago')->format('Y-m-d H:i:s'),
        ]);//35
        DB::table('permissions')->insert([
            'name' => 'View School Principal Dashboard',
            'slug' => 'view-school_principal-dashboard',
            'created_at' => Carbon::now('America/Chicago')->format('Y-m-d H:i:s'),
            'updated_at' => Carbon::now('America/Chicago')->format('Y-m-d H:i:s'),
        ]);//36
        DB::table('permissions')->insert([
            'name' => 'View School Teacher Dashboard',
            'slug' => 'view-school_teacher-dashboard',
            'created_at' => Carbon::now('America/Chicago')->format('Y-m-d H:i:s'),
            'updated_at' => Carbon::now('America/Chicago')->format('Y-m-d H:i:s'),
        ]);//37
        DB::table('permissions')->insert([
            'name' => 'View Substitute Teacher Dashboard',
            'slug' => 'view-substitute_teacher-dashboard',
            'created_at' => Carbon::now('America/Chicago')->format('Y-m-d H:i:s'),
            'updated_at' => Carbon::now('America/Chicago')->format('Y-m-d H:i:s'),
        ]);//38
        DB::table('permissions')->insert([
            'name' => 'View Substitute Teacher',
            'slug' => 'view_substitute_teacher',
            'created_at' => Carbon::now('America/Chicago')->format('Y-m-d H:i:s'),
            'updated_at' => Carbon::now('America/Chicago')->format('Y-m-d H:i:s'),
        ]);//39
    }
}
