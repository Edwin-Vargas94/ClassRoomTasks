<x-layouts.app :title="'Iniciar Sesión'">
    <head>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <link href="https://cdn.jsdelivr.net/npm/tailwindcss@2.2.19/dist/tailwind.min.css" rel="stylesheet">
        <link href="https://fonts.googleapis.com/css2?family=Roboto:wght@400;700&display=swap" rel="stylesheet">
    </head>
    <body>
        <main class="container align-center p-5">
            <form method="POST" action="{{route('inicia-sesion')}}" class="bg-white shadow-md rounded px-8 pt-6 pb-8 mb-4">
                @csrf
                <div class="mb-4">
                    <label for="email" class="block text-gray-700 text-sm font-bold mb-2">Email:</label>
                    <input type="email" id="email" name="email"
                    required class="shadow appearance-none border rounded w-full py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:shadow-outline">
                    @if ($errors->has('email'))
                        <div class="alert alert-danger text-red-500">
                            {{ $errors->first('email') }}
                        </div>
                    @endif
                </div>
                <div class="mb-4">
                    <label for="password" class="block text-gray-700 text-sm font-bold mb-2">Password:</label>
                    <input type="password" id="password" name="password"
                    required class="shadow appearance-none border rounded w-full py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:shadow-outline">
                    @if ($errors->has('password'))
                        <div class="alert alert-danger text-red-500">
                            {{ $errors->first('password') }}
                        </div>
                    @endif
                    @if (session()->has('error'))
                        <span class="text-danger">{{ session('error') }}</span>
                    @endif
                </div>
                <button type="submit" class="bg-blue-500 hover:bg-blue-700 text-white font-bold py-2 px-4 rounded focus:outline-none focus:shadow-outline">Acceder</button>
            </form>
        </main>
    </body>
    </x-layouts.app>
