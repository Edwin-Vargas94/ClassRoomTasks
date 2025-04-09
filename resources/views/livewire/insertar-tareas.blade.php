<form wire:submit.prevent="store" class="card p-4 shadow-sm mb-4">
    <br>
    <h2 class="h4 text-center mb-4">Crear Nueva Tarea</h2>

    @if (session()->has('success'))
        <div class="alert alert-success">
            {{ session('success') }}
        </div>
    @endif

    <div class="mb-3">
        <label class="form-label">Título:</label>
        <input type="text" class="form-control" wire:model="titulo" placeholder="Título">
        @error('titulo') <div class="text-danger small">{{ $message }}</div> @enderror
    </div>

    <div class="mb-3">
        <label class="form-label">Descripción:</label>
        <textarea class="form-control" wire:model="descripcion" rows="3"></textarea>
        @error('descripcion') <div class="text-danger small">{{ $message }}</div> @enderror
    </div>

    <div class="mb-3">
        <label class="form-label">Estado:</label>
        <select class="form-select" wire:model="estado">
            <option value="">Selecciona un estado</option>
            @foreach($estados as $estado)
                <option value="{{ $estado->id }}">{{ $estado->estado }}</option>
            @endforeach
        </select>
        @error('estado') <div class="text-danger small">{{ $message }}</div> @enderror
    </div>

    <div class="mb-3">
        <label class="form-label">Categoría:</label>
        <select class="form-select" wire:model="categoria">
            <option value="">Selecciona una categoría</option>
            @foreach($categorias as $categoria)
                <option value="{{ $categoria->id }}">{{ $categoria->categoria }}</option>
            @endforeach
        </select>
        @error('categoria') <div class="text-danger small">{{ $message }}</div> @enderror
    </div>

    @if(Auth::user()->Administrador)
        <div class="mb-3">
            <label class="form-label">Usuario asignado:</label>
            <select class="form-select" wire:model="usuario">
                <option value="">Selecciona un usuario</option>
                @foreach($usuarios as $usuario)
                    <option value="{{ $usuario->id }}">{{ $usuario->name }}</option>
                @endforeach
            </select>
            @error('usuario') 
                <div class="text-danger small">Por favor selecciona un usuario válido.</div> 
            @enderror
        </div>
    @endif

    <div class="mb-3">
        <label class="form-label">Fecha de vencimiento:</label>
        <input type="date" class="form-control" wire:model="fch_vencimiento">
        @error('fch_vencimiento') <div class="text-danger small">{{ $message }}</div> @enderror
    </div>

    <div class="form-check mb-3">
        <input type="checkbox" class="form-check-input" wire:model="prioridad" id="prioridadAlta">
        <label class="form-check-label" for="prioridadAlta">Prioridad alta</label>
    </div>

    <div class="text-center">
        <button type="submit" class="btn btn-primary">
            Guardar Tarea
        </button>
    </div>
</form>
