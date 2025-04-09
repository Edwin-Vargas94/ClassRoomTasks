<form>
    <input type="hidden" wire:model="categoria_id">
    <div class="form-group">
        <label for="exampleFormControlInput1">Categoria:</label>
        <input type="text" class="form-control" id="exampleFormControlInput1" placeholder="Título Categoria" wire:model="categoria">

        @error('categoria') <span class="text-danger">{{ $message }}</span>@enderror
    </div>
    <br>
    <div class="boton1">
        <button wire:click.prevent="update()" class="btn btn-dark">Actualizar</button>
        <button wire:click.prevent="cancel()" class="btn btn-danger">Cancelar</button>
    </div>
</form>
