<?php

namespace Tests\Feature;

use Tests\TestCase;
use Illuminate\Foundation\Testing\WithFaker;
use Illuminate\Foundation\Testing\RefreshDatabase;

class WelcomeUsersTest extends TestCase
{
    /** @test */
    function it_welcomes_users_with_nickname()
    {
        $this->get('/saludo/aaa/bbb')
        	->assertStatus(200)
        	->assertSee('bienvenido Aaa, tu apodo es bbb');
    }
    /** @test */
    function it_welcomes_users_without_nickname()
    {
        $this->get('/saludo/aaa')
        	->assertStatus(200)
        	->assertSee('bienvenido Aaa');
    }
}
