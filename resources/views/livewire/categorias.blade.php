<div>
    @if (session()->has('message'))
        <div class="alert alert-success">
            {{ session('message') }}
        </div>
    @endif


    @if($updateMode)
        @include('livewire.cats.categorias.update')
    @else
        @include('livewire.cats.categorias.create')
    @endif


    <table class="table table-bordered mt-5">
        <thead>
            <tr>
                <th>Num.</th>
                <th>Categoria</th>
                <th width="200px">Tareas</th>
            </tr>
        </thead>

        <tbody>
            @foreach($categorias as $categoria)
            <tr>
                <td>{{ $categoria->id }}</td>
                <td>{{ $categoria->categoria }}</td>

                <td>
                    <button wire:click="edit({{ $categoria->id }})" class="btn btn-primary btn-sm">Modificar</button>
                    <button wire:click="delete({{ $categoria->id }})" class="btn btn-danger btn-sm">Borrar</button>
                </td>
            </tr>
            @endforeach
        </tbody>
    </table>
</div>
