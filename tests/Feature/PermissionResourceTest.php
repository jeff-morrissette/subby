<?php

namespace Tests\Feature;

use App\User;
use App\Role;
use App\Permission;
use Tests\TestCase;
use Illuminate\Foundation\Testing\DatabaseMigrations;

class PermissionResourceTest extends TestCase
{
	use DatabaseMigrations;

    /** @test */
    function guests_may_not_create_permissions()
    {
        $this->withExceptionHandling();
        $this->get('/permission/create')
            ->assertRedirect('/login');
        $this->post('/permission/create')
            ->assertRedirect('/login');
    }

    /** @test */
    function an_authenticated_user_can_create_new_permissions()
    {
        $user = $this->actingAs(factory(User::class)->create());
    	$usercreated = User::find(1);
    	$role = factory(Role::class)->create(['name' => 'Super Administrator', 'slug' => 'super_administrator']);
    	$rolearray=array('role_id' => $role->id);

    	$usercreated->roles()->attach($role->id);

    	$permission = factory(Permission::class)->make(['name' => 'Create School', 'slug' => 'create_school']);
    	$permissionarray = $permission->toArray();

    	$postarray = array_merge($rolearray, $permissionarray);

    	$response = $this->post('/permission/create', $postarray);

    	$this->assertCount(1, $role->permissions);
    }

    /** @test */
    function a_permission_requires_a_name()
    {
        $this->withExceptionHandling();
        $user = $this->actingAs(factory(User::class)->create());
    	$usercreated = User::find(1);
    	$role = factory(Role::class)->create(['name' => 'Super Administrator', 'slug' => 'super_administrator']);
    	$rolearray=array('role_id' => $role->id);

    	$usercreated->roles()->attach($role->id);

    	$permission = factory(Permission::class)->make(['name' => null, 'slug' => 'create_school']);
    	$permissionarray = $permission->toArray();

    	$postarray = array_merge($rolearray, $permissionarray);

    	$response = $this->post('/permission/create', $postarray)
    					->assertSessionHasErrors('name');
    }

    /** @test */
    function a_permission_requires_a_slug()
    {
        $this->withExceptionHandling();
        $user = $this->actingAs(factory(User::class)->create());
    	$usercreated = User::find(1);
    	$role = factory(Role::class)->create(['name' => 'Super Administrator', 'slug' => 'super_administrator']);
    	$rolearray=array('role_id' => $role->id);

    	$usercreated->roles()->attach($role->id);

    	$permission = factory(Permission::class)->make(['name' => 'Create School', 'slug' => null]);
    	$permissionarray = $permission->toArray();

    	$postarray = array_merge($rolearray, $permissionarray);

    	$response = $this->post('/permission/create', $postarray)
    					->assertSessionHasErrors('slug');
    }

        /** @test */
    function a_permission_requires_a_valid_role()
    {
        $this->withExceptionHandling();
        $user = $this->actingAs(factory(User::class)->create());
    	$usercreated = User::find(1);
    	$role = factory(Role::class)->create(['name' => 'Super Administrator', 'slug' => 'super_administrator']);

    	$usercreated->roles()->attach($role->id);

    	$permission = factory(Permission::class)->make(['name' => 'Create School', 'slug' => null]);
    	
    	$rolearray=array('role_id' => null);
    	$permissionarray = $permission->toArray();

    	$postarray = array_merge($rolearray, $permissionarray);

    	$response = $this->post('/permission/create', $postarray)
    					->assertSessionHasErrors('role_id');

    	$rolearray2=array('role_id' => 999);

    	$postarray2 = array_merge($rolearray2, $permissionarray);

    	$response = $this->post('/permission/create', $postarray2)
    					->assertSessionHasErrors('role_id');
    }
}
