<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Soccer Team</title>
    @vite(['resources/sass/app.scss', 'resources/js/app.js'])
</head>
<body class="bg-gray-300 font-sans min-h-screen flex flex-col">
    <header>
        <nav class="bg-slate-900 text-white">
            <div class="container mx-auto flex justify-between items-center p-4">
            <div class="flex space-x-8">
                    <a href="{{ route('players.index') }}" class="text-white hover:text-red-400">Lista de Jogadores</a>
                    <a href="{{ route('players.create') }}" class="text-white hover:text-red-400">Adicionar Jogador</a>
                    <a href="{{ route('teams.index') }}" class="text-white hover:text-red-400">Time</a>
                </div>
            </div>
        </nav>
    </header>
    
    <main class="flex-grow container mx-auto my-8">
        @yield('content')
    </main>
    <div>
        <dialog id="error-modal" class="radix-dialog radix-state-open">
            <div class="radix-dialog-content">
                <h2 class="text-lg font-semibold">Erro</h2>
                <p id="error-message"></p>
                <button id="close-modal" class="mt-2 px-4 py-2 bg-red-500 text-white rounded">Fechar</button>
            </div>
        </dialog>
    </div>

    <script>
        document.addEventListener('DOMContentLoaded', function () {
            @if ($errors->any())
                alert("{{ $errors->first() }}");
            @endif
        });
    </script>
    <footer class="bg-slate-900 py-4">
        <div class="container mx-auto">
            <p class="text-center text-white">Roger @2024</p>
        </div>
    </footer>
</body>
</html>
