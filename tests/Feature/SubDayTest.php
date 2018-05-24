<?php

namespace Tests\Feature;

use App\User;
use App\Role;
use App\School;
use App\Country;
use App\Province;
use App\Permission;
use App\SchoolDivision;
use App\SubstitueTeacher;
use Tests\TestCase;
use Illuminate\Foundation\Testing\DatabaseMigrations;

class SubDayTest extends TestCase
{
    use DatabaseMigrations;

    /** @test */
    function guests_may_not_create_subday()
    {
        $this->withExceptionHandling();
        $this->get('/dashboard/super_administrator/substitute_teachers/create')
            ->assertRedirect('/login');
        $this->post('/dashboard/super_administrator/substitute_teachers/create')
            ->assertRedirect('/login');
    }

    protected function createworld()
    {
        $country = factory(Country::class)->create();
        $province = factory(Province::class)->create();
    }
}
