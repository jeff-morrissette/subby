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

class SchoolDivisionTest extends TestCase
{
    use DatabaseMigrations;

    /** @test */
    function guests_may_not_create_school_divisions()
    {
        $this->withExceptionHandling();
        $this->get('/dashboard/super_administrator/school_divisions/create')
            ->assertRedirect('/login');
        $this->post('/dashboard/super_administrator/school_divisions/create')
            ->assertRedirect('/login');
    }

    /** @test */
    function an_authenticated_user_can_create_new_school_divisions()
    {
        $user = $this->actingAs(factory(User::class)->create());
    	$usercreated = User::find(1);
    	$role = factory(Role::class)->create(['name' => 'Super Administrator', 'slug' => 'super_administrator']);
    	$rolearray=array('role_id' => $role->id);

    	$usercreated->roles()->attach($role->id);

    	$permission = factory(Permission::class)->create(['name' => 'Create School Division', 'slug' => 'create_school_division']);

        $role->permissions()->attach($permission->id);

    	$this->createworld();

    	$schooldivision = factory(SchoolDivision::class)->make([
    		'name' => 'Ryerson Elementary',
    		'slug' => 'ryerson-elementary',
    		'address' => '10 Ryerson Ave',
            'city' => 'Winnipeg',
            'province_id' => 1,
            'country_id' => 1,
            'postal_code' => 'R3T 3P9'
    	]);

    	//$postarray = array_merge($rolearray, $permissionarray);

    	$response = $this->post('/dashboard/super_administrator/school_divisions/create', $schooldivision->toArray());

    	$this->assertDatabaseHas('school_divisions', ['name' => $schooldivision->name]);
    }

    /** @test */
    function a_school_division_requires_a_name()
    {
        $this->withExceptionHandling();
        $user = $this->actingAs(factory(User::class)->create());
    	$usercreated = User::find(1);
    	$role = factory(Role::class)->create(['name' => 'Super Administrator', 'slug' => 'super_administrator']);
    	$rolearray=array('role_id' => $role->id);

    	$usercreated->roles()->attach($role->id);

    	$permission = factory(Permission::class)->create(['name' => 'Create School Division', 'slug' => 'create_school_division']);

        $role->permissions()->attach($permission->id);

    	$this->createworld();

    	$schooldivision = factory(SchoolDivision::class)->make([
    		'name' => null,
    		'slug' => 'ryerson-elementary',
    		'address' => '10 Ryerson Ave',
            'city' => 'Winnipeg',
            'province_id' => 1,
            'country_id' => 1,
            'postal_code' => 'R3T 3P9'
    	]);

    	//$postarray = array_merge($rolearray, $permissionarray);

    	$response = $this->post('/dashboard/super_administrator/school_divisions/create', $schooldivision->toArray())->assertSessionHasErrors('name');
    }

    /** @test */
    function authorized_users_can_update_school_division()
    {
        $user = $this->actingAs(factory(User::class)->create());
    	$usercreated = User::find(1);
    	$role = factory(Role::class)->create(['name' => 'Super Administrator', 'slug' => 'super_administrator']);
    	$rolearray=array('role_id' => $role->id);

    	$usercreated->roles()->attach($role->id);

    	$permission = factory(Permission::class)->create(['name' => 'Update School Division', 'slug' => 'update_school_division']);

        $role->permissions()->attach($permission->id);

    	$this->createworld();

    	$schooldivision = factory(SchoolDivision::class)->create([
    		'name' => 'Ryerson Elementary',
    		'slug' => 'ryerson-elementary',
    		'address' => '10 Ryerson Ave',
            'city' => 'Winnipeg',
            'province_id' => 1,
            'country_id' => 1,
            'postal_code' => 'R3T 3P9'
    	]);

    	$schooldivisionarray = $schooldivision->toArray();

        $updatedName = 'Beaumont Elementary';
        $schooldivisionarray['name'] = $updatedName;
        //dd($schooldivisionarray);
        $this->patch("/dashboard/super_administrator/school_divisions/edit/{$schooldivision->id}", $schooldivisionarray);
        $this->assertDatabaseHas('school_divisions', ['id' => $schooldivision->id, 'name' => $updatedName]);
    }

    protected function createworld()
    {
        $country = factory(Country::class)->create();
        $province = factory(Province::class)->create();
    }
}
