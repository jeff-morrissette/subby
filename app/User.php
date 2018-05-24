<?php

namespace App;

use App\SchoolTeacher;
use App\SubstituteTeacher;
use Illuminate\Notifications\Notifiable;
use Illuminate\Foundation\Auth\User as Authenticatable;

class User extends Authenticatable
{
    use Notifiable;

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'name', 'email', 'password', 'confirmation_token',
    ];

    /**
     * The attributes that should be hidden for arrays.
     *
     * @var array
     */
    protected $hidden = [
        'password', 'remember_token',
    ];

    protected $casts = [
        'confirmed' => 'boolean',
    ];

    public function roles()
    {
        return $this->belongsToMany(Role::class, 'roles_users');
    }

    /**
     * Checks if User has access to $permissions.
     */
    public function hasAccess(Array $permissions)
    {
        // check if the permission is available in any role
        //dd($permissions);
        foreach ($this->roles as $role) {
            //echo 'role: ' . $role;
            //echo  nl2br ("role " . $role . "\n\n");
            if($role->hasAccess($permissions, $role->id)) {
                return true;
            }
        }
        return false;
    }

    /**
     * Checks if the user belongs to role.
     */
    public function inRole($roleSlug)
    {
        return $this->roles()->where('slug', $roleSlug)->count() == 1;
    }

    /**
     * Get the teacher associated with the user.
     */
    public function teacher()
    {
        return $this->hasOne(SchoolTeacher::class);
    }

    /**
     * Get the Substitute teacher associated with the user.
     */
    public function substituteteacher()
    {
        return $this->hasOne(SubstituteTeacher::class);
    }
}
