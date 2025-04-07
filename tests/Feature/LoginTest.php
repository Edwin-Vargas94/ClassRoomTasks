<?php

namespace Tests\Feature;

use App\Models\User;
use Tests\TestCase;
//use Illuminate\Support\Facades\Hash; // EGVG 05/04/25: Importa la clase Hash
use Tests\Feature\Hash;
use Livewire\Livewire;

class LoginTest extends TestCase
{

    /*
    public function test_user_can_login_with_valid_credentials()
    {
        // EGVG 05/04/25: Crea un usuario con credenciales válidas
       // $user = User::factory()->create([
       //     'email' => 'asdqw.fay@example.net',
         //   'password' => bcrypt('3531'), // EGVG 05/04/25: Contraseña encriptada
        //]);

        // EGVG 05/04/25: Simula un inicio de sesión
        $response = $this->post('/login', [
            'email' => 'edwin_glz94@hotmail.com',
            'password' => bcrypt('123'), // EGVG 05/04/25: Contraseña sin encriptar para la prueba
        ]);

        // EGVG 05/04/25: Valida que redirige al dashboard y que el usuario está autenticado
        $response->assertRedirect('/dashboard');
        $this->assertAuthenticatedAs($response->user());
    }

    public function test_user_cannot_login_with_invalid_credentials()
    {
        // EGVG 05/04/25: Simula un intento de inicio de sesión con credenciales incorrectas
        $response = $this->post('/login', [
            'email' => 'selmer01@example.org',
            'password' => 'edwjrjrin',
        ]);

        // EGVG 05/04/25: Verifica que se muestran errores y nadie está autenticado
        $response->assertSessionHasErrors(['email']);
        $this->assertGuest();
    }*/

    public function test_guest_is_redirected_to_login_when_accessing_dashboard()
    {
        // EGVG 05/04/25: Intenta acceder al dashboard sin autenticación
        $response = $this->get('/dashboard');

        // EGVG 05/04/25: Valida que redirige al login
        $response->assertRedirect('/login');
    }

    /*
    public function test_authenticated_user_is_redirected_from_login_to_dashboard()
    {
        // EGVG 05/04/25: Crea un usuario autenticado
        $user = User::factory()->create();

        // EGVG 05/04/25: Simula que el usuario está autenticado
        $this->actingAs($user)
            ->get('/login') // EGVG 05/04/25: Intenta acceder al login
            ->assertRedirect('/dashboard'); // EGVG 05/04/25: Es redirigido al dashboard
    }*/

    /*
    public function test_inactive_user_cannot_login()
    {
        $user = User::factory()->create([
            'email' => 'CGD.abs@gmail.com',
            'password' => bcrypt('ari'),
            'activo' => 0, // <- importante: está inactivo
        ]);

        Livewire::test(\App\Livewire\Login::class)
            ->set('email', $user->email)
            ->set('password', 'ari')
            ->call('login')
            ->assertSessionHasErrors(['email' => 'Your account is inactive.']);

        $this->assertGuest();
    }
        */
}
