<?php

namespace Tests\Feature;

use App\User;
use App\Role;
use App\School;
use App\Country;
use App\Province;
use App\Permission;
use App\SchoolTeacher;
use App\SchoolDivision;
use Tests\TestCase;
use Illuminate\Foundation\Testing\DatabaseMigrations;

class SchoolTeacherTest extends TestCase
{
    use DatabaseMigrations;

    /** @test */
    function guests_may_not_create_school_teachers()
    {
        $this->withExceptionHandling();
        $this->get('/dashboard/super_administrator/teachers/create')
            ->assertRedirect('/login');
        $this->post('/dashboard/super_administrator/teachers/create')
            ->assertRedirect('/login');
    }

    /** @test */
    function an_authenticated_user_can_create_new_school_teachers()
    {
        //Create the super user first
        $user = $this->actingAs(factory(User::class)->create());
    	$usercreated = User::find(1);
    	$this->createroles();
        $role = Role::find(1);

    	$usercreated->roles()->attach($role->id);

    	$permission = factory(Permission::class)->create(['name' => 'Create School Teacher', 'slug' => 'create_school_teacher']);

        $role->permissions()->attach($permission->id);

    	//create the school teachers; this will all be part of the form to create the school teacher

    	//$userSchoolTeacher = factory(User::class)->make();

    	//$roleSchoolTeacher = factory(Role::class)->create(['name' => 'School Teacher', 'slug' => 'school_teacher']);

    	$this->createworld();

    	$schooldivision = factory(SchoolDivision::class)->create();
    	$school = factory(School::class)->create();

    	$schoolTeacher = factory(SchoolTeacher::class)->make([
    		'school_id' => $school->id,
    		'parking_stall' => 'Stall 8B',
    		'classroom' => '3TC',
    		'grade' => 6
    	]);

    	//$userSchoolTeacherarray = $userSchoolTeacher->toArray();
    	$schoolTeacherarray = $schoolTeacher->toArray();
    	$NAMEarray = array('name' => 'john doe');
    	$EMAILarray = array('email' => 'john.doe@example.com');
    	$postarray = array_merge($schoolTeacherarray, $EMAILarray, $NAMEarray);

    	$response = $this->post('/dashboard/super_administrator/teachers/create', $postarray);

    	$this->assertDatabaseHas('school_teachers', ['school_id' => $school->id]);
    }

    /** @test */
    function a_school_teacher_requires_a_name()
    {
        //Create the super user first
        $this->withExceptionHandling();
        //Create the super user first
        $user = $this->actingAs(factory(User::class)->create());
    	$usercreated = User::find(1);
    	$this->createroles();
        $role = Role::find(1);

    	$usercreated->roles()->attach($role->id);

    	$permission = factory(Permission::class)->create(['name' => 'Create School Teacher', 'slug' => 'create_school_teacher']);

        $role->permissions()->attach($permission->id);

    	//create the school teachers; this will all be part of the form to create the school teacher

    	//$userSchoolTeacher = factory(User::class)->make(['name' => null]);

    	//$roleSchoolTeacher = factory(Role::class)->create(['name' => 'School Teacher', 'slug' => 'school_teacher']);

    	$this->createworld();

    	$schooldivision = factory(SchoolDivision::class)->create();
    	$school = factory(School::class)->create();

    	$schoolTeacher = factory(SchoolTeacher::class)->make([
    		'school_id' => $school->id,
    		'parking_stall' => 'Stall 8B',
    		'classroom' => '3TC',
    		'grade' => 6
    	]);

    	//$userSchoolTeacherarray = $userSchoolTeacher->toArray();
    	$schoolTeacherarray = $schoolTeacher->toArray();
    	$NAMEarray = array('name' => '');
        $EMAILarray = array('email' => 'john.doe@example.com');
    	$postarray = array_merge($schoolTeacherarray, $NAMEarray, $EMAILarray);
        //dd($postarray);

    	$response = $this->post('/dashboard/super_administrator/teachers/create', $postarray)->assertSessionHasErrors('name');
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
    }
}
