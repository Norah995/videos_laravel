<?php

namespace Tests\Feature;

use Tests\TestCase;
use Illuminate\Foundation\Testing\WithFaker;
use Illuminate\Foundation\Testing\RefreshDatabase;

class UsersModuleTest extends TestCase
{
    /** @test */
    function it_shows_the_users()
    {
        $this->get('/usuarios')
        	->assertStatus(200)
        	->assertSee('lista de usuarios')
            ->assertSee('Joel');
    }

    /** @test */
    function it_shows_a_default_message_if_the_users_list_is_empy()
    {
        $this->get('/usuarios?empty')
            ->assertStatus(200)
            ->assertSee('No hay usuarios registrados');
    }
    /** @test */
    function it_loads_the_new_users_page()
    {
        //para ver el error informacion
        //$this->withoutExceptionHandling();
        $this->get('/usuarios/nuevo')
        	->assertStatus(200)
        	->assertSee('Crear nuevo usuario');
    }
    /** @test */
    function it_loads_the_users_details_page()
    {
        $this->get('/usuarios/5')
        	->assertStatus(200)
        	->assertSee('mostrando detalle del usuario: 5');
    }
    
    
}
