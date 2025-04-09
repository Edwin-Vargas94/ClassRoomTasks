<?php

namespace App\Livewire;

use Livewire\Component;
use App\Models\Tarea;
use App\Models\Estado;
use App\Models\Categoria;
use App\Models\User;
use Illuminate\Support\Facades\Auth;

class EditarTareas extends Component
{
    public $tareaId, $titulo, $descripcion, $estado, $categoria, $usuario, $fch_vencimiento, $prioridad;
    public $estados, $categorias, $usuarios;
    public $finalizada = false;

    public function mount($id) //EGVG 08/04/25: Método para inicializar los datos de la vista.
    {
        $tarea = Tarea::findOrFail($id);

        $this->tareaId = $tarea->id;
        $this->titulo = $tarea->titulo;
        $this->descripcion = $tarea->descripcion;
        $this->estado = $tarea->fk_estado;
        $this->categoria = $tarea->fk_categoria;
        $this->usuario = $tarea->fk_user_asig;
        $this->fch_vencimiento = $tarea->fch_vencimiento;
        $this->prioridad = $tarea->prioridad;

        $this->estados = Estado::all();
        $this->categorias = Categoria::all();
        $this->usuarios = User::all();
        $this->finalizada = ($tarea->fk_estado == 3);
    }

    public function update() //EGVG 08/04/25: Método para actualizar la tarea.
    {
        $validateData = $this->validate([
            'titulo' => 'required|string|max:255',
            'estado' => 'required|exists:estados,id',
            'categoria' => 'required|exists:categorias,id',
            'usuario' => 'required|exists:users,id',
            'fch_vencimiento' => 'date',
            'prioridad' => 'nullable|boolean',]
            , [ //EGVG 08/04/25: Personaliza los mensajes de error.
                'titulo.required' => 'El título es obligatorio.',
                'estado.required' => 'Debes seleccionar un estado.',
                'categoria.required' => 'Debes seleccionar una categoría.',
                'fch_vencimiento.date' => 'La fecha de vencimiento debe ser una fecha válida.',
        ]);

        $tarea = Tarea::findOrFail($this->tareaId);//EGVG 08/04/25: Buscar la tarea por ID.

        $tarea->update([ //EGVG 08/04/25: Actualizar la tarea con los datos validados.
            'titulo' => $this->titulo,
            'descripcion' => $this->descripcion,
            'fk_estado' => $this->estado,
            'fk_categoria' => $this->categoria,
            'fk_user_asig' => $this->usuario,
            'prioridad' => $this->prioridad ? 1 : 0,
            'fch_vencimiento' => $this->fch_vencimiento,
            'user_mod' => Auth::id(),
        ]);

        session()->flash('success', 'Tarea actualizada correctamente.');
        return redirect()->route('dashboard');
    }

    public function render() //EGVG 08/04/25: Método para renderizar la vista.
    {
        return view('livewire.editar-tareas');
    }

    public function finalizarTarea() //EGVG 08/04/25: Método para finalizar la atrae.
    {
        $estadoFinalizadoId = 3; //EGVG 08/04/25: ID del estado "Finalizado".
        $tarea = Tarea::find($this->tareaId); //EGVG 08/04/25: Buscar la tarea por ID.

        if ($tarea) {
            $tarea->fk_estado = $estadoFinalizadoId;
            $tarea->save();

            $this->estado = $estadoFinalizadoId;
            $this->finalizada = true;

            session()->flash('success', 'La tarea ha sido finalizada.');
        }
    }
}
