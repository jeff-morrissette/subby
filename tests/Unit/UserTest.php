<?php

namespace Tests\Unit;

use App\User;
use App\Role;
use App\Permission;
use Tests\TestCase;
use Illuminate\Foundation\Testing\DatabaseMigrations;

class UserTest extends TestCase
{
	use DatabaseMigrations;

    /** @test */
    function a_user_has_roles()
    {
        
    	$user = $this->actingAs(factory(User::class)->create());
    	$usercreated = User::find(1);
    	$role = factory(Role::class)->create(['name' => 'Super Administrator', 'slug' => 'super_admin']);

    	$usercreated->roles()->attach($role->id);

        $this->assertInstanceOf(
            'Illuminate\Database\Eloquent\Collection', $usercreated->roles
        );
    }

    /** @test */
    function a_user_has_access_to_permissions()
    {
        
    	$user = $this->actingAs(factory(User::class)->create());
    	$usercreated = User::find(1);
    	$role = factory(Role::class)->create(['name' => 'Super Administrator', 'slug' => 'super_admin']);

    	$permission1 = factory(Permission::class)->create(['name' => 'Create School', 'slug' => 'create_school']);
    	$permission2 = factory(Permission::class)->create(['name' => 'Create Teacher', 'slug' => 'create_teacher']);
    	
    	$role->permissions()->attach($permission1->id);

    	$usercreated->roles()->attach($role->id);

        $this->assertTrue($usercreated->hasAccess(['create_school']));
    }

    /** @test */
    function a_user_that_does_not_have_access_to_permissions()
    {
        
    	$user = $this->actingAs(factory(User::class)->create());
    	$usercreated = User::find(1);
    	$role = factory(Role::class)->create(['name' => 'Super Administrator', 'slug' => 'super_admin']);

    	$permission1 = factory(Permission::class)->create(['name' => 'Create School', 'slug' => 'create_school']);
    	$permission2 = factory(Permission::class)->create(['name' => 'Create Teacher', 'slug' => 'create_teacher']);
    	
    	$role->permissions()->attach($permission1->id);

    	$usercreated->roles()->attach($role->id);

        $this->assertFalse($usercreated->hasAccess(['not_a_permission']));
    }

    /** @test */
    function a_user_belongs_to_a_role()
    {
        
    	$user = $this->actingAs(factory(User::class)->create());
    	$usercreated = User::find(1);
    	$role = factory(Role::class)->create(['name' => 'Super Administrator', 'slug' => 'super_admin']);

    	$usercreated->roles()->attach($role->id);

        $this->assertTrue($usercreated->inRole('super_admin'));
    }

    /** @test */
    function a_user_that_does_not_belong_to_a_role()
    {
        
    	$user = $this->actingAs(factory(User::class)->create());
    	$usercreated = User::find(1);
    	$role = factory(Role::class)->create(['name' => 'Super Administrator', 'slug' => 'super_admin']);

    	$usercreated->roles()->attach($role->id);

        $this->assertFalse($usercreated->inRole('not_a_role'));
    }
}
