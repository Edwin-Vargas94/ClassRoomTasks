<form>

    <input type="hidden" wire:model="estado_id">

    <div class="form-group">
        <label for="exampleFormControlInput1">Actualizar:</label>
        <input type="text" class="form-control" id="exampleFormControlInput1" placeholder="Nuevo estado" wire:model="estado">
        @error('estado') <span class="text-danger">{{ $message }}</span>@enderror
    </div>
    <br>
    <button wire:click.prevent="update()" class="btn btn-dark">Actualizar</button>
    <button wire:click.prevent="cancel()" class="btn btn-danger">Cancelar</button>

</form>
