<?php

namespace App\Livewire;

use Livewire\Component;
use App\Models\Estado;
use App\Models\Categoria;
use App\Models\User;
use Illuminate\Support\Facades\Auth;
use App\Models\Tarea;

class InsertarTareas extends Component
{
    public $titulo, $descripcion, $estado, $categoria, $usuario, $fch_vencimiento, $prioridad;
    public $estados, $categorias, $usuarios;

    public function mount() //EGVG 08/04/25: Método para inicializar los datos de la vista.
    {
        $this->estados = Estado::all();
        $this->categorias = Categoria::all();
        $this->usuarios = User::all();
    }
    
    public function store() //EGVG 08/04/25: Método para guardar la tarea
    {

        //dd($this->titulo, $this->descripcion, $this->estado, $this->categoria, $this->usuario, $this->fch_vencimiento, $this->prioridad);

        //EGVG 08/04/25: Valida los datos de entrada.
        $validateData = $this->validate([
            'titulo' => 'required|string|max:255',
            'estado' => 'required|exists:estados,id',
            'categoria' => 'required|exists:categorias,id',
            'prioridad' => 'nullable|boolean', ]
            , [ //EGVG 08/04/25: Personaliza los mensajes de error.
                'titulo.required' => 'El título es obligatorio.',
                'estado.required' => 'Debes seleccionar un estado.',
                'categoria.required' => 'Debes seleccionar una categoría.',
        ]);
        

        $validateData['descripcion'] =  $this->descripcion; //EGVG 08/04/25: Asignar la descripción si existe, de lo contrario asignar una cadena vacía.
        $validateData['fk_estado'] = $validateData['estado']; //EGVG 08/04/25: Asignar el ID del usuario autenticado.
        $validateData['fk_categoria'] = $validateData['categoria']; //EGVG 08/04/25: Asignar el ID del usuario autenticado.
        $validateData['fk_user_asig'] = Auth::id(); //EGVG 08/04/25: Asignar el ID del usuario autenticado.
        //dd($validateData['fk_user_asig']);
        unset($validateData['estado'], $validateData['categoria'], $validateData['usuario']);

        $validateData['user_add'] = Auth::id(); //EGVG 08/04/25: Asignar el ID del usuario autenticado.
        $validateData['user_mod'] = Auth::id(); //EGVG 08/04/25: Asignar el ID del usuario autenticado.
        $validateData['prioridad'] = $this->prioridad ? 1 : 0; //EGVG 08/04/25: Convertir el valor del checkbox a 1 o 0.
        //dd($this->titulo, $this->descripcion, $this->estado, $this->categoria, $this->fk_user_asig, $this->fch_vencimiento, $this->prioridad);
        Tarea::create($validateData);//EGVG 08/04/25: Crear la tarea con los datos validados.
    
        session()->flash('success', 'Tarea creada exitosamente.');//EGVG 08/04/25: Redirige a la vista de dashboard después de crear la tarea.
        $this->resetInputFields(); //EGVG 08/04/25: Redirige a la vista de dashboard después de crear la tarea.
    }
    public function resetInputFields() //EGVG 08/04/25: Método para reiniciar los campos de entrada.
{
    $this->titulo = '';
    $this->descripcion = '';
    $this->estado = null;
    $this->categoria = null;
    $this->usuario = null;
    $this->fch_vencimiento = now();
    $this->prioridad = false;
}


    public function render() //EGVG 08/04/25: Método para renderizar la vista.
    {
        return view('livewire.insertar-tareas');
    }

}
