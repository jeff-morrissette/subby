<?php

namespace Tests\Feature;

use App\User;
use App\Role;
use App\School;
use App\Country;
use App\Province;
use App\Permission;
use App\SchoolDivision;
use Carbon\Carbon;
use Tests\TestCase;
use Illuminate\Foundation\Testing\DatabaseMigrations;

class SchoolTest extends TestCase
{
    use DatabaseMigrations;

    /** @test */
    function guests_may_not_create_schools()
    {
        $this->withExceptionHandling();
        $this->get('/dashboard/super_administrator/schools/create')
            ->assertRedirect('/login');
        $this->post('/dashboard/super_administrator/schools/create')
            ->assertRedirect('/login');
    }

    /** @test */
    function an_authenticated_user_can_create_new_schools()
    {
        $user = $this->actingAs(factory(User::class)->create());
    	$usercreated = User::find(1);
    	$role = factory(Role::class)->create(['name' => 'Super Administrator', 'slug' => 'super_administrator']);
    	$rolearray=array('role_id' => $role->id);

    	$usercreated->roles()->attach($role->id);

    	$permission = factory(Permission::class)->create(['name' => 'Create School', 'slug' => 'create_school']);

        $role->permissions()->attach($permission->id);

    	$this->createworld();

    	$schooldivision = factory(SchoolDivision::class)->create();

    	$school = factory(School::class)->make([
    		'school_division_id' => $schooldivision->id,
    		'name' => 'Ryerson Elementary',
    		'slug' => 'ryerson-elementary',
    		'address' => '10 Ryerson Ave',
            'city' => 'Winnipeg',
            'province_id' => 1,
            'country_id' => 1,
            'postal_code' => 'R3T 3P9',
            'start_time_hour' => '07',
            'start_time_minute' => '55',
            'start_time_lunch_hour' => '11',
            'start_time_lunch_minute' => '55',
            'end_time_lunch_hour' => '13',
            'end_time_lunch_minute' => '10',
            'end_time_hour' => '16',
            'end_time_minute' => '00'
    	]);

    	//$postarray = array_merge($rolearray, $permissionarray);
        //dd($school->toArray());
    	$response = $this->post('/dashboard/super_administrator/schools/create', $school->toArray());

    	$this->assertDatabaseHas('schools', ['name' => $school->name]);
    }

    /** @test */
    function a_school_requires_a_name()
    {
        $this->withExceptionHandling();
        $user = $this->actingAs(factory(User::class)->create());
    	$usercreated = User::find(1);
    	$role = factory(Role::class)->create(['name' => 'Super Administrator', 'slug' => 'super_administrator']);
    	$rolearray=array('role_id' => $role->id);

    	$usercreated->roles()->attach($role->id);

    	$permission = factory(Permission::class)->create(['name' => 'Create School', 'slug' => 'create_school']);

        $role->permissions()->attach($permission->id);

    	$this->createworld();

    	$schooldivision = factory(SchoolDivision::class)->create();

    	$school = factory(School::class)->make([
    		'school_division_id' => $schooldivision->id,
    		'name' => null,
    		'slug' => 'ryerson-elementary',
    		'address' => '10 Ryerson Ave',
            'city' => 'Winnipeg',
            'province_id' => 1,
            'country_id' => 1,
            'postal_code' => 'R3T 3P9'
    	]);

    	//$postarray = array_merge($rolearray, $permissionarray);

    	$response = $this->post('/dashboard/super_administrator/schools/create', $school->toArray())->assertSessionHasErrors('name');
    }

    /** @test */
    function authorized_users_can_update_school()
    {
        $user = $this->actingAs(factory(User::class)->create());
    	$usercreated = User::find(1);
    	$role = factory(Role::class)->create(['name' => 'Super Administrator', 'slug' => 'super_administrator']);
    	$rolearray=array('role_id' => $role->id);

    	$usercreated->roles()->attach($role->id);

    	$permission = factory(Permission::class)->create(['name' => 'Update School', 'slug' => 'update_school']);

        $role->permissions()->attach($permission->id);

    	$this->createworld();

    	$schooldivision = factory(SchoolDivision::class)->create();

    	$school = factory(School::class)->create([
    		'school_division_id' => $schooldivision->id,
            'name' => 'Ryerson Elementary',
            'slug' => 'ryerson-elementary',
            'address' => '10 Ryerson Ave',
            'city' => 'Winnipeg',
            'province_id' => 1,
            'country_id' => 1,
            'postal_code' => 'R3T 3P9'
            //'start_time_hour' => '07',
            //'start_time_minute' => '55',
            //'start_time_lunch_hour' => '11',
            //'start_time_lunch_minute' => '55',
            //'end_time_lunch_hour' => '13',
            //'end_time_lunch_minute' => '10',
            //'end_time_hour' => '16',
            //'end_time_minute' => '00'
    	]);

    	$schoolarray = $school->toArray();

        //dd($schoolarray);

        $updatedName = 'Beaumont Elementary';
        $schoolarray['name'] = $updatedName;
        $schoolarray['start_time_hour'] = '07';
        $schoolarray['start_time_minute'] = '55';
        $schoolarray['start_time_lunch_hour'] = '11';
        $schoolarray['start_time_lunch_minute'] = '55';
        $schoolarray['end_time_lunch_hour'] = '13';
        $schoolarray['end_time_lunch_minute'] = '10';
        $schoolarray['end_time_hour'] = '16';
        $schoolarray['end_time_minute'] = '00';
        //dd($schooldivisionarray);
        $this->patch("/dashboard/super_administrator/schools/edit/{$school->id}", $schoolarray);
        $this->assertDatabaseHas('schools', ['id' => $school->id, 'name' => $updatedName]);
    }

    protected function createworld()
    {
        $country = factory(Country::class)->create();
        $province = factory(Province::class)->create();
    }
}
