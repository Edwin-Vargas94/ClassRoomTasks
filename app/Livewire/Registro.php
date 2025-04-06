<?php

namespace App\Livewire;

use Livewire\Component;
use Illuminate\Support\Facades\Hash;
use Illuminate\Http\Request; //EGVG 05/04/25: Importa la clase Request para manejar las solicitudes HTTP.
use App\Models\User; //EGVG 05/04/25: Importa el modelo User para interactuar con los registros de usuarios en la base de datos.
use Illuminate\Support\Facades\Auth; //EGVG 05/04/25: Importa la clase Auth para manejar la autenticación de usuarios.
use Livewire\Attributes\Title; //EGVG 05/04/25: Importa el atributo Title para configurar el título de la página.
use Livewire\Attributes\Validate; //EGVG 05/04/25: Importa el atributo Validate para agregar reglas de validación a las propiedades.

#[Title('Registro de usuario')] //EGVG 05/04/25: Declara el título de la página como 'Registro de usuario' usando el atributo #[Title].

class Registro extends Component
{
    #[Validate('required|string|min:3|max:250')] //EGVG 05/04/25: Valida que el nombre sea obligatorio, una cadena de texto y tenga entre 3 y 250 caracteres.
    public $name;

    #[Validate('required|email|max:250|unique:users,email')] //EGVG 05/04/25: Valida que el correo electrónico sea obligatorio, un email válido, único y no mayor a 250 caracteres.
    public $email;

    #[Validate('required|string|min:8|confirmed')] //EGVG 05/04/25: Valida que la contraseña sea obligatoria, una cadena de texto, tenga un mínimo de 8 caracteres y coincida con la confirmación.
    public $password;

    public function register(Request $request)
    {
        $user = new User(); //EGVG 05/04/25: Crea una nueva instancia del modelo User.
        $user->name = request('name'); //EGVG 05/04/25: Asigna el nombre proporcionado por el usuario al modelo User.
        $user->email = request('email'); //EGVG 05/04/25: Asigna el correo proporcionado por el usuario al modelo User.
        $user->password = Hash::make(request('password')); //EGVG 05/04/25: Cifra la contraseña ingresada por el usuario antes de guardarla.
        $user->save(); //EGVG 05/04/25: Guarda el nuevo usuario en la base de datos.

        Auth::login($user); //EGVG 05/04/25: Inicia sesión automáticamente con el usuario recién creado.

        //EGVG 05/04/25: Redirige al usuario al dashboard con un mensaje de éxito.
        return redirect()->route('dashboard')->with('success', 'Usuario registrado con éxito.');
    }

    public function render()
    {
        //EGVG 05/04/25: Renderiza la vista asociada al componente de Livewire llamada 'registro'.
        return view('livewire.registro');
    }
}
