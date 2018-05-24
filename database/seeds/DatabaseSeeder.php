<?php

use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $this->call(UsersTableSeeder::class);
        $this->call(RolesTableSeeder::class);
        $this->call(RolesUsersTableSeeder::class);
        $this->call(PermissionsTableSeeder::class);
        $this->call(PermissionsRolesTableSeeder::class);
        $this->call(CountriesTableSeeder::class);
        $this->call(ProvincesTableSeeder::class);
        $this->call(SchoolDivisionTableSeeder::class);
        $this->call(SchoolDivisionAdministratorTableSeeder::class);
        $this->call(SchoolTableSeeder::class);
        $this->call(SchoolAdministratorTableSeeder::class);
        $this->call(PrincipalTableSeeder::class);
        $this->call(TeacherTableSeeder::class);
        $this->call(SubstituteTableSeeder::class);
        $this->call(SchoolDivisionSubstitueTeacherTableSeeder::class);
        $this->call(SubdaysTableSeeder::class);
    }
}
