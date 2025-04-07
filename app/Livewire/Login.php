<?php

namespace App\Livewire;

use Livewire\Component;
use Illuminate\Support\Facades\Auth;
use Livewire\Attributes\Title;


class Login extends Component
{

    public function login()
    {
        //EGVG 05/04/25: Verifica si las credenciales del usuario son correctas con Auth::attempt.
        if (Auth::attempt(['email' => request('email'), 'password' => request('password'), 'activo' => 1])) {
            //EGVG 05/04/25: Si las credenciales son válidas, redirige al usuario al dashboard con un mensaje de éxito.
            return redirect()->route('dashboard')->with('success', 'Inicio de sesión exitoso.');
        } else {
            //EGVG 05/04/25: Si las credenciales son incorrectas, redirige nuevamente a la página de login con un mensaje de error.
            return redirect()->route('login')->withErrors(['password' => 'Credenciales incorrectas.']);
        }
    }

    public function render()
    {
        //EGVG 05/04/25: Renderiza la vista asociada al componente de Livewire llamada 'login'.
        return view('livewire.login');
    }
}
