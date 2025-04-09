<form wire:submit.prevent="update" class="card p-4 shadow-sm mb-4" :title="'Editar Tarea'">
    <br>
    <h2 class="h4 text-center mb-4">Editar Tarea</h2>

    @if (session()->has('success'))
        <div class="alert alert-success">
            {{ session('success') }}
        </div>
    @endif

    <div class="mb-3">
        <label class="form-label">Título:</label>
        <input type="text" class="form-control" wire:model="titulo" placeholder="Título" @disabled($finalizada)>
        @error('titulo') <div class="text-danger small">{{ $message }}</div> @enderror
    </div>

    <div class="mb-3">
        <label class="form-label">Descripción:</label>
        <textarea class="form-control" wire:model="descripcion" rows="3" @disabled($finalizada)></textarea>
        @error('descripcion') <div class="text-danger small">{{ $message }}</div> @enderror
    </div>

    <div class="mb-3">
        <label class="form-label">Estado:</label>
        <select class="form-select" wire:model="estado" @disabled($finalizada)>
            <option value="">Selecciona un estado</option>
            @foreach($estados as $estado)
                <option value="{{ $estado->id }}">{{ $estado->estado }}</option>
            @endforeach
        </select>
        @error('estado') <div class="text-danger small">{{ $message }}</div> @enderror
    </div>

    <div class="mb-3">
        <label class="form-label">Categoría:</label>
        <select class="form-select" wire:model="categoria" @disabled($finalizada)>
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
        <select class="form-select" wire:model="usuario" @disabled($finalizada)>
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
        <input type="date" class="form-control" wire:model="fch_vencimiento" @disabled($finalizada)>
        @error('fch_vencimiento') <div class="text-danger small">{{ $message }}</div> @enderror
    </div>

    <div class="form-check mb-3">
        <input type="checkbox" class="form-check-input" wire:model="prioridad" id="prioridadAltaEdit" @disabled($finalizada)>
        <label class="form-check-label" for="prioridadAltaEdit">Prioridad alta</label>
    </div>

    <div class="d-flex justify-content-end">
        <a href="{{ route('dashboard') }}" class="btn btn-custom mr-2" style="background-color: #007bff; color: white; border: 2px solid #007bff; padding: 10px 20px; border-radius: 10px; font-size: 16px; font-weight: none; text-decoration: none; transition: all 0.3s ease;">
            Cancelar
        </a>
        <button type="submit" class="btn btn-success mx-2" @disabled($finalizada)>
            Guardar Cambios
        </button>
        <button type="button" class="btn btn-danger" wire:click="finalizarTarea" @disabled($finalizada)>
            Finalizar Tarea
        </button>
    </div>
</form>