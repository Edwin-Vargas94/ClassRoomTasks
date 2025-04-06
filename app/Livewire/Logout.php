<?php

namespace App\Livewire;

use Livewire\Component;
use Illuminate\Support\Facades\Auth;
use Livewire\Attributes\Title;


class Logout extends Component
{
    public function logout()
    {
        //EGVG 05/04/25: Cierra la sesión del usuario autenticado utilizando el método Auth::logout.
        Auth::logout();

        //EGVG 05/04/25: Redirige al usuario a la página de login con un mensaje de éxito indicando que la sesión se cerró correctamente.
        return redirect()->route('login')->with('success', 'Has cerrado sesión exitosamente.');
        //EGVG 05/04/25: (Opción comentada) Redirige utilizando un método alternativo con navegación habilitada.
        // return $this->redirectRoute('login', navigate: true);
    }

    public function render()
    {
        //EGVG 05/04/25: Renderiza la vista asociada al componente de Livewire llamada 'logout'.
        return view('livewire.logout');
    }
}
