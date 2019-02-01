<?php

namespace Tests\Feature;

use Tests\TestCase;
use Illuminate\Foundation\Testing\WithFaker;
use Illuminate\Foundation\Testing\RefreshDatabase;

class Prueba1Test extends TestCase
{
    /**
     * A basic test example.
     *
     * @return void
     */
    public function testExample()
    {
        $response = $this->get('/');
        $response->assertStatus(200);  
    }

    function testRegistro(){
        $respuesta = $this->get('/register')->assertStatus(200);
        $respuesta->assertSee('Nombre de usuario');
        $respuesta->assertSee('Contraseña');
    }

    function testUserLogin(){
    
     $response = $this->get('/login');
        $response->assertSuccessful();
        $response->assertViewIs('auth.login');
        //Crear un usuario
        $user = factory(User::class)->create([
            //Se asigna un password
            'password' => bcrypt($password = '1234567890'),
            //Se asigna un tipo, se define por el controlador
            'type' => '1',
            'avatar' = 'img/avatar2.png',
        ]);
        //Si el login del usuario es correcto
        $response = $this->post('/login', [
            'email' => $user->email,
            'password' => $password,
        ]);
        //Si se redireccionó al usuario a la url Inicio
        $response->assertRedirect('/home');
        //Si el usuario logueado esta autenticado
        $this->assertAuthenticatedAs($user);
    }

}
