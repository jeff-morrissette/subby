<?php

namespace App;

use App\Permission;
use Illuminate\Database\Eloquent\Model;

class Role extends Model
{
    protected $fillable = [
        'name', 'slug',
    ];

    public function users()
    {
        return $this->belongsToMany(User::class, 'roles_users');
    }

    public function permissions()
    {
        return $this->belongsToMany(Permission::class, 'permissions_roles');
    }

    public function hasAccess(Array $userPermissions, $role_id)
    {
        $userRoles = Role::with('permissions')->where('id', $role_id)->get();
        //dd($userPermissions);
        //dd($userRoles);
        foreach ($userRoles as $rolepermissions) {
            foreach ($rolepermissions->permissions as $rolePermission) {
                //echo  nl2br ("userPermissions " . $userPermissions[0] . "\n\n");
                //echo  nl2br ("rolePermission " . $rolePermission->slug . "\n");
                //echo  nl2br (strcmp($userPermissions[0], $rolePermission->slug) . "\n");
                if (strcmp($userPermissions[0], $rolePermission->slug) == 0) {
                    //echo  nl2br ("This is true \n");
                    return true;
                }
            }
        }
        return false;
    }

    private function hasPermission($permission)
    {
        return Permission::where('slug', $permission)->count() == 1;
    }
}
