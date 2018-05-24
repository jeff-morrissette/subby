<?php

namespace Tests\Unit;

use App\User;
use App\Role;
use App\Permission;
use Tests\TestCase;
use Illuminate\Foundation\Testing\DatabaseMigrations;

class RoleTest extends TestCase
{
    use DatabaseMigrations;

    /** @test */
    function a_role_has_permissions()
    {
    	$role = factory(Role::class)->create(['name' => 'Super Administrator', 'slug' => 'super_admin']);
    	$permission = factory(Permission::class)->create(['name' => 'Create Teacher', 'slug' => 'create_teacher']);
    	$role->permissions()->attach($permission->id);

        $this->assertInstanceOf(
            'Illuminate\Database\Eloquent\Collection', $role->permissions
        );
    }

    /** @test 
    function a_role_has_access_to_a_permission()
    {
    	$role = factory(Role::class)->create(['name' => 'Super Administrator', 'slug' => 'super_admin']);
    	$permission = factory(Permission::class)->create(['name' => 'Create Teacher', 'slug' => 'create_teacher']);
    	$role->permissions()->attach($permission->id);
    	//dd($permission);
        $this->assertTrue($role->hasAccess(['create_teacher']));
    }*/

    /** @test 
    function a_role_that_does_not_have_access_to_a_permission()
    {
    	$role = factory(Role::class)->create(['name' => 'Super Administrator', 'slug' => 'super_admin']);
    	$permission = factory(Permission::class)->create(['name' => 'Create Teacher', 'slug' => 'create_teacher']);
    	$role->permissions()->attach($permission->id);
    	//dd($permission);
        $this->assertFalse($role->hasAccess(['not_a_permission']));
    }*/
}
