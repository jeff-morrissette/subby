<?php

namespace Tests\Feature;

use App\User;
use App\Role;
use App\Country;
use App\Province;
use App\Permission;
use App\SchoolDivision;
use Tests\TestCase;
use Illuminate\Foundation\Testing\DatabaseMigrations;

class SchoolDivisionAdministratorTest extends TestCase
{
    use DatabaseMigrations;

    /** @test */
    function guests_may_not_create_school_division_administrators()
    {
        $this->withExceptionHandling();
        $this->get('/dashboard/super_administrator/school_division_administrators/create')
            ->assertRedirect('/login');
        $this->post('/dashboard/super_administrator/school_division_administrators/create')
            ->assertRedirect('/login');
    }

    /** @test */
    function an_authenticated_user_can_create_new_school_division_administrators()
    {
        //Create the super user first
        $user = $this->actingAs(factory(User::class)->create());
    	$usercreated = User::find(1);
    	$role = factory(Role::class)->create(['name' => 'Super Administrator', 'slug' => 'super_administrator']);
    	$rolearray=array('role_id' => $role->id);

    	$usercreated->roles()->attach($role->id);

    	$permission = factory(Permission::class)->create(['name' => 'Create School Division Administrator', 'slug' => 'create_school_division_administrator']);

        $role->permissions()->attach($permission->id);

    	//create the school division administrator; this will all be part of the form to create the school division administrator

    	$userSDAdmin = factory(User::class)->make();
    	$roleSDAdmin = factory(Role::class)->create(['name' => 'School Division Administrator', 'slug' => 'school_division_administrator']);
    	//$roleSDAdminarray=array('role_id' => $roleSDAdmin->id);

    	//$userSDAdmin->roles()->attach($roleSDAdmin->id);

    	$this->createworld();

    	$schooldivision = factory(SchoolDivision::class)->create();

    	$userSDAdminarray = $userSDAdmin->toArray();
    	$SDarray = array('school_division_id' => $schooldivision->id);
    	$NAMEarray = array('name' => 'john doe');
    	$EMAILarray = array('email' => 'john.doe@example.com');
    	$postarray = array_merge($userSDAdminarray, $SDarray, $EMAILarray, $NAMEarray);
        //dd($postarray);
        
    	$response = $this->post('/dashboard/super_administrator/school_division_administrators/create', $postarray);
        //dd('made it this far');
    	$this->assertDatabaseHas('school_division_administrators', ['school_division_id' => $schooldivision->id]);
    }

    /** @test */
    function a_school_division_administrator_requires_a_name()
    {
        //Create the super user first
        $this->withExceptionHandling();
        $user = $this->actingAs(factory(User::class)->create());
    	$usercreated = User::find(1);
    	$role = factory(Role::class)->create(['name' => 'Super Administrator', 'slug' => 'super_administrator']);
    	$rolearray=array('role_id' => $role->id);

    	$usercreated->roles()->attach($role->id);

    	$permission = factory(Permission::class)->create(['name' => 'Create School Division Administrator', 'slug' => 'create_school_division_administrator']);

        $role->permissions()->attach($permission->id);

    	//create the school division administrator; this will all be part of the form to create the school division administrator

    	$userSDAdmin = factory(User::class)->make(['name' => null]);
    	$roleSDAdmin = factory(Role::class)->create(['name' => 'School Division Administrator', 'slug' => 'school_division_administrator']);
    	//$roleSDAdminarray=array('role_id' => $roleSDAdmin->id);

    	//$userSDAdmin->roles()->attach($roleSDAdmin->id);

    	$this->createworld();

    	$schooldivision = factory(SchoolDivision::class)->create();

    	$userSDAdminarray = $userSDAdmin->toArray();
    	$SDarray = array('schooldivision_id' => $schooldivision->id);
    	$PASSarray = array('password' => 'secret');
    	$roleSDAdminarray = array('role_id' => $roleSDAdmin->id);
    	$postarray = array_merge($userSDAdminarray, $SDarray, $roleSDAdminarray, $PASSarray);
        //dd($postarray);

    	$response = $this->post('/dashboard/super_administrator/school_division_administrators/create', $postarray)->assertSessionHasErrors('name');
    }

    protected function createworld()
    {
        $country = factory(Country::class)->create();
        $province = factory(Province::class)->create();
    }
}
