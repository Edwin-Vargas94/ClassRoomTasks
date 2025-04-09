<div class="bg-white shadow rounded-lg p-4">
    @if (session()->has('success'))
        <div class="bg-green-100 text-green-700 p-2 rounded mb-4">
            {{ session('success') }}
        </div>
    @endif

    <table class="min-w-full table-auto text-sm">
        <thead>
            <tr class="bg-gray-100">
                <th class="px-4 py-2 text-left">Título</th>
                <th class="px-4 py-2 text-left">Descripción</th>
                <th class="px-4 py-2 text-left">Categoría</th>
                <th class="px-4 py-2 text-left">Estado</th>
                <th class="px-4 py-2 text-left">Fecha límite</th>
                <th class="px-4 py-2 text-left">Prioridad</th>
                <th width="210px" class="px-4 py-2 text-left">Acciones</th>
            </tr>
        </thead>
        <tbody>
            @foreach($tareas as $tarea)
                <tr class="border-t">
                    <td class="px-4 py-2">{{ $tarea->titulo }}</td>
                    <td class="px-4 py-2">{{ $tarea->descripcion }}</td>
                    <td class="px-4 py-2">{{ $tarea->categoria->categoria ?? '-' }}</td>
                    <td class="px-4 py-2">{{ $tarea->estado->estado ?? '-' }}</td>
                    <td class="px-4 py-2">{{ \Carbon\Carbon::parse($tarea->fch_vencimiento)->format('d/m/Y') }}</td>
                    <td class="px-4 py-2">
                        @if($tarea->prioridad)
                            <span class="text-red-500 font-semibold">Alta</span>
                        @else
                            Baja
                        @endif
                    </td>
                    <td class="px-4 py-2 space-x-2">
                        @if($tarea->fk_estado != 3)
                            <button wire:click="editar({{ $tarea->id }})"
                                class="bg-yellow-400 hover:bg-yellow-500 text-white px-3 py-1 rounded">
                                Editar
                            </button>
                        @endif
                        <button wire:click="confirmarEliminacion({{ $tarea->id }})"
                            class="bg-red-500 hover:bg-red-600 text-white px-3 py-1 rounded">
                            Eliminar
                        </button>
                    </td>
                </tr>
            @endforeach
        </tbody>
    </table>

    {{-- Confirmación de eliminación --}}
    @if($confirmingDelete)
        <div class="fixed inset-0 flex items-center justify-center bg-gray-800 bg-opacity-50 z-50">
            <div class="bg-white p-6 rounded shadow-lg text-center">
                <p class="mb-4 text-lg">¿Estás seguro de que quieres eliminar esta tarea?</p>
                <div class="flex justify-center space-x-4">
                    <button wire:click="eliminar"
                        class="bg-red-600 hover:bg-red-700 text-white px-4 py-2 rounded">Sí, eliminar</button>
                    <button wire:click="cancelarEliminacion"
                        class="bg-gray-400 hover:bg-gray-500 text-white px-4 py-2 rounded">Cancelar</button>
                </div>
            </div>
        </div>
    @endif
</div>
