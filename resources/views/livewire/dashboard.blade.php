<div>
<x-layouts.app :title="'Panel de tareas'">
    <head>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <link href="https://cdn.jsdelivr.net/npm/tailwindcss@2.2.19/dist/tailwind.min.css" rel="stylesheet">
        <link href="https://fonts.googleapis.com/css2?family=Roboto:wght@400;700&display=swap" rel="stylesheet">
    </head>
    <body>
        <div class="container mx-auto px-4">
            <header class="d-flex flex-wrap align-items-center justify-content-center justify-content-md-between py-3 mb-4">
                <h2 class="text-center text-2xl font-bold mb-4">Mis Tareas</h2>
                <div class="flex justify-end mb-4">
                    <a href="{{ route('tareas-crear') }}"
                        class="bg-blue-500 hover:bg-blue-700 text-white font-bold py-2 px-4 rounded">
                        + Nueva Tarea
                    </a>
                </div>
            </header>

            <div>
                @livewire('tareas')
            </div>
        </div>
    </body>
</x-layouts.app>
</div>
