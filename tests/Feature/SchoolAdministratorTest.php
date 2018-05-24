<?php

namespace Tests\Feature;

use App\User;
use App\Role;
use App\School;
use App\Country;
use App\Province;
use App\Permission;
use App\SchoolDivision;
use Tests\TestCase;
use Illuminate\Foundation\Testing\DatabaseMigrations;

class SchoolAdministratorTest extends TestCase
{
    use DatabaseMigrations;

    /** @test */
    function guests_may_not_create_school_administrators()
    {
        $this->withExceptionHandling();
        $this->get('/dashboard/super_administrator/school_administrators/create')
            ->assertRedirect('/login');
        $this->post('/dashboard/super_administrator/school_administrators/create')
            ->assertRedirect('/login');
    }

    /** @test */
    function an_authenticated_user_can_create_new_school_administrators()
    {
        //Create the super user first
        $user = $this->actingAs(factory(User::class)->create());
    	$usercreated = User::find(1);
    	$this->createroles();
        $role = Role::find(1);

    	$usercreated->roles()->attach($role->id);

    	$permission = factory(Permission::class)->create(['name' => 'Create School Administrator', 'slug' => 'create_school_administrator']);

        $role->permissions()->attach($permission->id);

    	//create the school administrator; this will all be part of the form to create the school administrator

    	//$userSchoolAdministrator = factory(User::class)->make();
    	//$roleSchoolAdministrator = factory(Role::class)->create(['name' => 'School Administrator', 'slug' => 'school_administrator']);

    	$this->createworld();

    	$schooldivision = factory(SchoolDivision::class)->create();
    	$school = factory(School::class)->create();

    	//$userSchoolAdministratorarray = $userSchoolAdministrator->toArray();
    	$Schoolarray = array('school_id' => $school->id);
    	$NAMEarray = array('name' => 'john doe');
        $EMAILarray = array('email' => 'john.doe@example.com');
    	$postarray = array_merge($Schoolarray, $NAMEarray, $EMAILarray);
        //dd($postarray);

    	$response = $this->post('/dashboard/super_administrator/school_administrators/create', $postarray);

    	$this->assertDatabaseHas('school_administrators', ['school_id' => $school->id]);
    }

    /** @test */
    function a_school_administrator_requires_a_name()
    {
        //Create the super user first
        $this->withExceptionHandling();
        $user = $this->actingAs(factory(User::class)->create());
    	$usercreated = User::find(1);
    	$this->createroles();
        $role = Role::find(1);

    	$usercreated->roles()->attach($role->id);

    	$permission = factory(Permission::class)->create(['name' => 'Create School Administrator', 'slug' => 'create_school_administrator']);

        $role->permissions()->attach($permission->id);

    	//create the school administrator; this will all be part of the form to create the school administrator

    	//$userSchoolAdministrator = factory(User::class)->make(['name' => null]);
    	//$roleSchoolAdministrator = factory(Role::class)->create(['name' => 'School Administrator', 'slug' => 'school_administrator']);

    	$this->createworld();

    	$schooldivision = factory(SchoolDivision::class)->create();
    	$school = factory(School::class)->create();

    	//$userSchoolAdministratorarray = $userSchoolAdministrator->toArray();
    	$Schoolarray = array('school_id' => $school->id);
    	$NAMEarray = array('name' => null);
        $EMAILarray = array('email' => 'john.doe@example.com');
    	//$postarray = array_merge($userSchoolAdministratorarray, $Schoolarray, $NAMEarray, $EMAILarray);
        $postarray = array_merge($Schoolarray, $NAMEarray, $EMAILarray);

    	$response = $this->post('/dashboard/super_administrator/school_administrators/create', $postarray)->assertSessionHasErrors('name');
    }

    protected function createworld()
    {
        $country = factory(Country::class)->create();
        $province = factory(Province::class)->create();
    }

    protected function createroles()
    {
        $super_administrator = factory(Role::class)->create(['name' => 'Super Administrator', 'slug' => 'super_administrator']);
        $school_division_administrator = factory(Role::class)->create(['name' => 'School Division Administrator', 'slug' => 'school_division_administrator']);
        $school_administrator = factory(Role::class)->create(['name' => 'School Administrator', 'slug' => 'school_administrator']);
        $school_principal = factory(Role::class)->create(['name' => 'School Principal', 'slug' => 'school_principal']);
    }
}
