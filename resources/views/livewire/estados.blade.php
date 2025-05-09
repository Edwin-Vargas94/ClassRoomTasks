<div>
    @if (session()->has('message'))
    <div class="alert alert-success">
        {{ session('message') }}
    </div>
@endif



@if($updateMode)
    @include('livewire.cats.estados.update')
@else
    @include('livewire.cats.estados.create')
@endif



<table class="table table-bordered mt-5" :title="'Lista de Estados'">
    <thead>
        <tr>
            <th>No.</th>
            <th>Estados</th>
            <th width="150px">Action</th>
        </tr>
    </thead>

    <tbody>
        @foreach($estados as $estado)
            <tr>
                <td>{{ $estado->id }}</td>
                <td>{{ $estado->estado }}</td>
                <td>
                    <button wire:click="edit({{ $estado->id }})" class="btn btn-primary btn-sm">Editar</button>
                    <button onclick="confirmDelete({{ $estado->id }})" class="btn btn-danger btn-sm">Eliminar</button>
                    <script>
                        function confirmDelete(id) {
                            if (confirm('¿Estás seguro de que deseas eliminar este estado?')) {
                                @this.call('delete', id);
                            }
                        }
                    </script>
                </td>
            </tr>
        @endforeach
    </tbody>

</table>
</div>
