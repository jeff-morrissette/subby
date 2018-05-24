<?php

namespace App\Providers;

use Illuminate\Support\Facades\Gate;
use Illuminate\Foundation\Support\Providers\AuthServiceProvider as ServiceProvider;

class AuthServiceProvider extends ServiceProvider
{
    /**
     * The policy mappings for the application.
     *
     * @var array
     */
    protected $policies = [
        'App\Model' => 'App\Policies\ModelPolicy',
    ];

    /**
     * Register any authentication / authorization services.
     *
     * @return void
     */
    public function boot()
    {
        $this->registerPolicies();
        $this->registerPermissionPolicies();
        //
    }

    public function registerPermissionPolicies()
    {
        Gate::define('create_permission', function ($user) {
            return $user->hasAccess(['create_permission']);
        });
        Gate::define('delete_permission', function ($user) {
            return $user->hasAccess(['delete_permission']);
        });
        Gate::define('update_permission', function ($user) {
            return $user->inRole('super_administrator');
        });
        Gate::define('create_school_division', function ($user) {
            return $user->hasAccess(['create_school_division']);
        });
        Gate::define('update_school_division', function ($user) {
            return $user->hasAccess(['update_school_division']);
        });
        Gate::define('delete_school_division', function ($user) {
            return $user->hasAccess(['delete_school_division']);
        });
        Gate::define('create_school_division_administrator', function ($user) {
            return $user->hasAccess(['create_school_division_administrator']);
        });
        Gate::define('update_school_division_administrator', function ($user) {
            return $user->hasAccess(['update_school_division_administrator']);
        });
        Gate::define('delete_school_division_administrator', function ($user) {
            return $user->hasAccess(['delete_school_division_administrator']);
        });
        Gate::define('create_school', function ($user) {
            return $user->hasAccess(['create_school']);
        });
        Gate::define('update_school', function ($user) {
            return $user->hasAccess(['update_school']);
        });
        Gate::define('delete_school', function ($user) {
            return $user->hasAccess(['delete_school']);
        });
        Gate::define('create_principal', function ($user) {
            return $user->hasAccess(['create_principal']);
        });
        Gate::define('update_principal', function ($user) {
            return $user->hasAccess(['update_principal']);
        });
        Gate::define('delete_principal', function ($user) {
            return $user->hasAccess(['delete_principal']);
        });
        Gate::define('create_school_administrator', function ($user) {
            return $user->hasAccess(['create_school_administrator']);
        });
        Gate::define('update_school_administrator', function ($user) {
            return $user->hasAccess(['update_school_administrator']);
        });
        Gate::define('delete_school_administrator', function ($user) {
            return $user->hasAccess(['delete_school_administrator']);
        });
        Gate::define('create_school_teacher', function ($user) {
            return $user->hasAccess(['create_school_teacher']);
        });
        Gate::define('update_school_teacher', function ($user) {
            return $user->hasAccess(['update_school_teacher']);
        });
        Gate::define('delete_school_administrator', function ($user) {
            return $user->hasAccess(['delete_school_teacher']);
        });
        Gate::define('view_substitute_teacher', function ($user) {
            return $user->hasAccess(['view_substitute_teacher']);
        });
        Gate::define('create_substitute_teacher', function ($user) {
            return $user->hasAccess(['create_substitute_teacher']);
        });
        Gate::define('update_substitute_teacher', function ($user) {
            return $user->hasAccess(['update_substitute_teacher']);
        });
        Gate::define('delete_substitute_teacher', function ($user) {
            return $user->hasAccess(['delete_substitute_teacher']);
        });
        Gate::define('create_substitute_day', function ($user) {
            return $user->hasAccess(['create_substitute_day']);
        });
        Gate::define('update_substitute_day', function ($user) {
            return $user->hasAccess(['update_substitute_day']);
        });
        Gate::define('delete_substitute_day', function ($user) {
            return $user->hasAccess(['delete_substitue_day']);
        });
        Gate::define('view_substitute_day', function ($user) {
            return $user->hasAccess(['view_substitute_day']);
        });
        Gate::define('create_substitute_task', function ($user) {
            return $user->hasAccess(['create_substitute_task']);
        });
        Gate::define('update_substitute_task', function ($user) {
            return $user->hasAccess(['update_substitute_task']);
        });
        Gate::define('view_substitute_task', function ($user) {
            return $user->hasAccess(['view_substitute_task']);
        });
        Gate::define('create_substitute_teacher_vacation_day', function ($user) {
            return $user->hasAccess(['create_substitute_teacher_vacation_day']);
        });
        Gate::define('view-super_administrator-dashboard', function ($user) {
            return $user->hasAccess(['view-super_administrator-dashboard']);
        });
        Gate::define('view-school_division_administrator-dashboard', function ($user) {
            return $user->hasAccess(['view-school_division_administrator-dashboard']);
        });
        Gate::define('view-school_administrator-dashboard', function ($user) {
            return $user->hasAccess(['view-school_administrator-dashboard']);
        });
        Gate::define('view-school_principal-dashboard', function ($user) {
            return $user->hasAccess(['view-school_principal-dashboard']);
        });
        Gate::define('view-school_teacher-dashboard', function ($user) {
            return $user->hasAccess(['view-school_teacher-dashboard']);
        });
        Gate::define('view-substitute_teacher-dashboard', function ($user) {
            return $user->hasAccess(['view-substitute_teacher-dashboard']);
        });
    }
}
