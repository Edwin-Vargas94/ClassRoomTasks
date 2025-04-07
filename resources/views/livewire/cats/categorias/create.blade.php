<form>
    <div class="form-group">
        <label for="exampleFormControlInput1">Categoria:</label>
        <input type="text" class="form-control" id="exampleFormControlInput1" placeholder="Título categoria" wire:model="categoria">
        @error('categoria') <span class="text-danger">{{ $message }}</span>@enderror
    </div>
    <br>
    <button wire:click.prevent="store()" class="btn btn-success">Guardar</button>
</form>
