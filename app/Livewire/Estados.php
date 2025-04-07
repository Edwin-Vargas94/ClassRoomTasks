<?php

namespace App\Livewire;

use Livewire\Component;
use App\Models\Estado;

class Estados extends Component
{
    public $estados, $estado, $estado_id;
    public $updateMode = false;

    public function render() //EGVG 05/04/25: Método para renderizar la vista Livewire y cargar todos los estados.
    {
        //EGVG 05/04/25: Obtiene todos los estados de la base de datos y los asigna a la propiedad pública $estados.
        $this->estados = Estado::all();

        //EGVG 05/04/25: Retorna la vista correspondiente al componente Livewire.
        return view('livewire.estados');
    }

    private function resetInputFields() //EGVG 05/04/25: Método privado para resetear los campos de entrada.
    {
        //EGVG 05/04/25: Vacía el valor de la propiedad $estado.
        $this->estado = '';
    }

    public function store() //EGVG 05/04/25: Método para almacenar un nuevo estado con validación de entrada.
    {
        //EGVG 05/04/25: Valida que el campo 'estado' sea requerido.
        $ValidatedData = $this->validate([
            'estado' => 'required',
        ]);

        //EGVG 05/04/25: Crea un nuevo estado en la base de datos con los datos validados.
        Estado::create($ValidatedData);

        //EGVG 05/04/25: Genera un mensaje de éxito para indicar que el estado fue creado correctamente.
        session()->flash('message', 'Estado Created Successfully.');

        //EGVG 05/04/25: Resetea los campos de entrada.
        $this->resetInputFields();
    }

    public function edit($id) //EGVG 05/04/25: Método para cargar los datos de un estado específico en modo edición.
    {
        //EGVG 05/04/25: Busca un estado específico por su ID. Si no existe, lanza un error.
        $estado = Estado::findOrFail($id);

        //EGVG 05/04/25: Asigna los valores del estado encontrado a las propiedades correspondientes.
        $this->estado = $estado->estado;
        $this->estado_id = $id;

        //EGVG 05/04/25: Activa el modo de edición.
        $this->updateMode = true;
    }

    public function update() //EGVG 05/04/25: Método para actualizar un estado existente con validación.
    {
        //EGVG 05/04/25: Valida que el campo 'estado' sea requerido.
        $this->validate([
            'estado' => 'required',
        ]);

        //EGVG 05/04/25: Encuentra el estado por su ID para actualizarlo.
        $estado = Estado::find($this->estado_id);

        //EGVG 05/04/25: Actualiza el campo 'estado' con el nuevo valor proporcionado.
        $estado->update([
            'estado' => $this->estado,
        ]);

        //EGVG 05/04/25: Desactiva el modo de edición.
        $this->updateMode = false;

        //EGVG 05/04/25: Genera un mensaje de éxito para indicar que el estado fue actualizado correctamente.
        session()->flash('message', 'Estado actualizado correctamente');

        //EGVG 05/04/25: Resetea los campos de entrada.
        $this->resetInputFields();
    }

    public function cancel() //EGVG 05/04/25: Método para cancelar la edición de un estado.
    {
        //EGVG 05/04/25: Desactiva el modo de edición.
        $this->updateMode = false;

        //EGVG 05/04/25: Resetea los campos de entrada.
        $this->resetInputFields();
    }

    public function delete($id) //EGVG 05/04/25: Método para eliminar un estado específico.
    {
        //EGVG 05/04/25: Encuentra el estado por su ID y lo elimina de la base de datos.
        Estado::find($id)->delete();

        //EGVG 05/04/25: Genera un mensaje de éxito para indicar que el estado fue eliminado correctamente.
        session()->flash('message', 'Categoria eliminada correctamente.');
    }
}
