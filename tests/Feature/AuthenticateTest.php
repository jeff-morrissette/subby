<?php

namespace Tests\Feature;

use Tests\TestCase;
use Illuminate\Foundation\Testing\DatabaseMigrations;

class AuthenticateTest extends TestCase
{
    use DatabaseMigrations;

    /** @test */
    function unauthorized_guests_need_to_login()
    {
        $this->withExceptionHandling();

        $this->get('/dashboard/super_administrator')
            ->assertRedirect('/login');

    }
}
