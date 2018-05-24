<?php

namespace Tests\Feature;

use App\User;
use App\Role;
use App\School;
use App\Country;
use App\Province;
use App\Permission;
use App\SchoolDivision;
use App\SubstituteTeacher;
use Tests\TestCase;
use Illuminate\Foundation\Testing\DatabaseMigrations;

class SubstituteTeacherTest extends TestCase
{
    use DatabaseMigrations;

    /** @test */
    function guests_may_not_create_substitue_teachers()
    {
        $this->withExceptionHandling();
        $this->get('/dashboard/super_administrator/substitute_teachers/create')
            ->assertRedirect('/login');
        $this->post('/dashboard/super_administrator/substitute_teachers/create')
            ->assertRedirect('/login');
    }

    /** @test */
    function an_authenticated_user_can_create_new_school_substitute_teachers()
    {
        //Create the super user first
        $user = $this->actingAs(factory(User::class)->create());
    	$usercreated = User::find(1);
    	$this->createroles();
        $role = Role::find(1);

    	$usercreated->roles()->attach($role->id);

    	$permission = factory(Permission::class)->create(['name' => 'Create Substitute Teacher', 'slug' => 'create_substitute_teacher']);

        $role->permissions()->attach($permission->id);

    	//create the school teachers; this will all be part of the form to create the school teacher

    	//$userSubstitueTeacher = factory(User::class)->make();

    	//$roleSubstituteTeacher = factory(Role::class)->create(['name' => 'Substitute Teacher', 'slug' => 'substitute_teacher']);

    	$this->createworld();

    	$schooldivision = factory(SchoolDivision::class)->create();

    	$substituteTeacher = factory(SubstituteTeacher::class)->make([
    		'address' => '123 Somewhere Ave',
            'city' => 'Winnipeg',
            'province_id' => 1,
            'country_id' => 1,
            'postal_code' => 'A1B 2C3',
            'phone' => '204-555-1234'
    	]);

    	//$userSubstitueTeacherarray = $userSubstitueTeacher->toArray();
    	$substituteTeacherarray = $substituteTeacher->toArray();
    	$NAMEarray = array('name' => 'john doe');
        $EMAILarray = array('email' => 'john.doe@example.com');
    	$postarray = array_merge($substituteTeacherarray, $NAMEarray, $EMAILarray);
        //dd($postarray);

    	$response = $this->post('/dashboard/super_administrator/substitute_teachers/create', $postarray);

    	$this->assertDatabaseHas('substitute_teachers', ['address' => $substituteTeacher->address]);
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
        $school_teacher = factory(Role::class)->create(['name' => 'School Teacher', 'slug' => 'school_teacher']);
        $substitute_teacher = factory(Role::class)->create(['name' => 'Substitute Teacher', 'slug' => 'substitute_teacher']);
    }
}
