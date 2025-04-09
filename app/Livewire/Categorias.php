<?php

namespace App\Livewire;

use Livewire\Component;
use App\Models\Categoria;

class Categorias extends Component
{
    public $categorias, $categoria, $categoria_id;
    public $updateMode = false;


    public function render() //EGVG 05/04/25: Método para renderizar la vista Livewire y cargar todas las categorías.
    {
        //EGVG 05/04/25: Obtiene todas las categorías de la base de datos y las asigna a la propiedad pública $categorias.
        $this->categorias = Categoria::all();

        //EGVG 05/04/25: Retorna la vista correspondiente al componente Livewire.
        return view('livewire.categorias');
    }

    private function resetInputFields() //EGVG 05/04/25: Método privado para resetear los campos de entrada.
    {
        //EGVG 05/04/25: Vacía el valor de la propiedad $categoria.
        $this->categoria = '';
    }

    public function store() //EGVG 05/04/25: Método para almacenar una nueva categoría con validación de entrada.
    {
        //EGVG 05/04/25: Valida que el campo 'categoria' sea requerido.
        $validatedDate = $this->validate([
            'categoria' => 'required',]
            , [ //EGVG 05/04/25: Personaliza los mensajes de error.
                'categoria.required' => 'El campo categoria es obligatorio.',
        ]);

        //EGVG 05/04/25: Crea una nueva categoría en la base de datos con los datos validados.
        Categoria::create($validatedDate);

        //EGVG 05/04/25: Genera un mensaje de éxito para indicar que la categoría fue agregada correctamente.
        session()->flash('message', 'Categoria agregada exitosamente.');

        //EGVG 05/04/25: Resetea los campos de entrada.
        $this->resetInputFields();
    }


    public function edit($id) //EGVG 05/04/25: Método para editar una categoría específica.
    {
        //EGVG 05/04/25: Busca una categoría específica por su ID. Si no existe, lanza un error.
        $categoria = Categoria::findOrFail($id);

        //EGVG 05/04/25: Asigna los valores de la categoría encontrada a las propiedades correspondientes.
        $this->categoria_id = $id;
        $this->categoria = $categoria->categoria;

        //EGVG 05/04/25: Activa el modo de actualización.
        $this->updateMode = true;
    }

    public function cancel() //EGVG 05/04/25: Método para cancelar la edición de una categoría.
    {
        //EGVG 05/04/25: Desactiva el modo de actualización.
        $this->updateMode = false;

        //EGVG 05/04/25: Resetea los campos de entrada.
        $this->resetInputFields();
    }

    public function update() //EGVG 05/04/25: Método para actualizar una categoría existente con validación.
    {
        //EGVG 05/04/25: Valida que el campo 'categoria' sea requerido.
        $this->validate([
            'categoria' => 'required',
        ]);

        //EGVG 05/04/25: Encuentra la categoría por su ID para actualizarla.
        $categoria = Categoria::find($this->categoria_id);

        //EGVG 05/04/25: Actualiza el campo 'categoria' con el nuevo valor proporcionado.
        $categoria->update([
            'categoria' => $this->categoria,
        ]);

        //EGVG 05/04/25: Desactiva el modo de actualización.
        $this->updateMode = false;

        //EGVG 05/04/25: Genera un mensaje de éxito para indicar que la categoría fue actualizada correctamente.
        session()->flash('message', 'Categoria actualizada correctamente');

        //EGVG 05/04/25: Resetea los campos de entrada.
        $this->resetInputFields();
    }

    public function delete($id) //EGVG 05/04/25: Método para eliminar una categoría específica.
    {
        //EGVG 05/04/25: Encuentra la categoría por su ID y la elimina de la base de datos.
        Categoria::find($id)->delete();

        //EGVG 05/04/25: Genera un mensaje de éxito para indicar que la categoría fue eliminada correctamente.
        session()->flash('message', 'Categoria eliminada correctamente.');
    }

}
