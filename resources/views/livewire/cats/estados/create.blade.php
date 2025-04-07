<form>

    <div class="form-group">
        <label for="exampleFormControlInput1">Estado:</label>
        <input type="text" class="form-control" id="exampleFormControlInput1" placeholder="Enter title" wire:model="estado">
        @error('estado') <span class="text-danger">{{ $message }}</span>@enderror
    </div>
    <br>
    <button wire:click.prevent="store()" class="btn btn-success">Guardar</button>
</form>
