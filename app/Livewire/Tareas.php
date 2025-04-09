<?php

namespace App\Livewire;

use Livewire\Component;
use App\Models\Tarea;
use Illuminate\Support\Facades\Auth;

class Tareas extends Component
{
    public $tareas;
    public $confirmingDelete = false;
    public $tareaAEliminar;

    public function editar($id) //EGVG 07/04/25: Funcion para editar una tarea.
    {
        return redirect()->route('tareas-editar', ['id' => $id]);
    }

    public function confirmarEliminacion($id) //EGVG 07/04/25: Funcion para confirmar la eliminación de una tarea.
    {
        $this->confirmingDelete = true;
        $this->tareaAEliminar = $id;
    }

    public function cancelarEliminacion() //EGVG 07/04/25: Funcion para cancelar la eliminación de una tarea.
    {
        $this->confirmingDelete = false;
        $this->tareaAEliminar = null;
    }

    public function eliminar() //EGVG 07/04/25: Función para eliminar una tarea.
    {
        Tarea::findOrFail($this->tareaAEliminar)->delete();

        //EGVG 07/04/25: Recargar lista de tareas
        $this->tareas = Tarea::with(['estado', 'categoria', 'user'])->get();

        //EGVG 07/04/25: Desactiva la confirmación de eliminación al asignar false a la propiedad $confirmingDelete.
        $this->confirmingDelete = false;
        //EGVG 07/04/25: Muestra un mensaje de éxito indicando que la tarea fue eliminada correctamente.
        session()->flash('success', 'Tarea eliminada correctamente.');
    }

    //EGVG 07/04/25: Método para renderizar la vista Livewire y cargar las tareas con relaciones asociadas.
    public function render()
    {
        //EGVG 07/04/25: Verifica si el usuario está autenticado.
        if (Auth::check()) {
            //EGVG 07/04/25: Carga las tareas asignadas al usuario autenticado, incluyendo las relaciones con 'estado' y 'categoria'.
            $this->tareas = Tarea::with(['estado', 'categoria'])
                ->where('fk_user_asig', Auth::id()) //EGVG 07/04/25: Filtra las tareas por el ID del usuario autenticado.
                ->get();
        }

        //EGVG 07/04/25: Retorna la vista correspondiente al componente Livewire con las tareas cargadas.
        return view('livewire.tareas', [
            //EGVG 07/04/25: Pasa la variable $tareas a la vista como parámetro para su uso.
            'tareas' => $this->tareas
        ]);
    }
}
