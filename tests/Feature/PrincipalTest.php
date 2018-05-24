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

class PrincipalTest extends TestCase
{
    use DatabaseMigrations;

    /** @test */
    function guests_may_not_create_principals()
    {
        $this->withExceptionHandling();
        $this->get('/dashboard/super_administrator/principals/create')
            ->assertRedirect('/login');
        $this->post('/dashboard/super_administrator/principals/create')
            ->assertRedirect('/login');
    }

    /** @test */
    function an_authenticated_user_can_create_new_principals()
    {
        //Create the super user first
        $user = $this->actingAs(factory(User::class)->create());
    	$usercreated = User::find(1);
        $this->createroles();
    	$role = Role::find(1);

    	$usercreated->roles()->attach($role->id);

    	$permission = factory(Permission::class)->create(['name' => 'Create Principal', 'slug' => 'create_principal']);

        $role->permissions()->attach($permission->id);

    	//create the school principal; this will all be part of the form to create the school principal

    	//$userPrincipal = factory(User::class)->make();
    	//$rolePrincipal = factory(Role::class)->create(['name' => 'School Principal', 'slug' => 'school_principal']);

    	$this->createworld();

    	$schooldivision = factory(SchoolDivision::class)->create();
    	$school = factory(School::class)->create();

    	//$userPrincipalarray = $userPrincipal->toArray();
    	$Schoolarray = array('school_id' => $school->id);
    	$NAMEarray = array('name' => 'john doe');
    	$EMAILarray = array('email' => 'john.doe@example.com');
    	//$postarray = array_merge($userPrincipalarray, $Schoolarray, $EMAILarray, $NAMEarray);
        $postarray = array_merge($Schoolarray, $EMAILarray, $NAMEarray);
        //dd($postarray);

    	$response = $this->post('/dashboard/super_administrator/principals/create', $postarray);

    	$this->assertDatabaseHas('principals', ['school_id' => $school->id]);
    }

    /** @test */
    function a_school_principal_requires_a_name()
    {
        //Create the super user first
        $this->withExceptionHandling();
        $user = $this->actingAs(factory(User::class)->create());
    	$usercreated = User::find(1);
    	$this->createroles();
        $role = Role::find(1);

    	$usercreated->roles()->attach($role->id);

    	$permission = factory(Permission::class)->create(['name' => 'Create Principal', 'slug' => 'create_principal']);

        $this->createworld();

    	//create the school principal; this will all be part of the form to create the school principal
        $schooldivision = factory(SchoolDivision::class)->create();
    	$school = factory(School::class)->create();

    	$Schoolarray = array('school_id' => $school->id);
    	$NAMEarray = array('name' => '');
        $EMAILarray = array('email' => 'john.doe@example.com');
    	$postarray = array_merge($Schoolarray, $NAMEarray, $EMAILarray);

        //dd($postarray);
    	//$response = $this->post('/dashboard/super_administrator/principals/create', $postarray)->assertSessionHasErrors('name');
        $response = $this->post('/dashboard/super_administrator/principals/create', $postarray);
        $response->assertSessionHasErrors('name');
        //dd($response);

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
