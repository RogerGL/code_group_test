@extends('layout.app')

@section('content')
<div class="max-w-2xl mx-auto bg-white p-6 rounded-lg shadow-md dark:bg-gray-800">
    <h2 class="text-2xl font-semibold text-gray-900 dark:text-white">Editar Jogador</h2>

    <form action="{{ route('players.update', $player->id) }}" method="POST">
        @csrf
        @method('PUT')

        <div class="mb-4">
            <label for="name" class="block text-sm font-medium text-gray-700 dark:text-gray-300">Nome</label>
            <input type="text" id="name" name="name" value="{{ old('name', $player->name) }}" class="mt-1 block w-full px-3 py-2 border border-gray-300 rounded-md shadow-sm focus:outline-none focus:ring-blue-500 focus:border-blue-500 sm:text-sm dark:border-gray-700 dark:bg-gray-900 dark:text-gray-300 dark:focus:ring-blue-500 dark:focus:border-blue-500" required>
            @error('name')
                <p class="text-red-500 text-xs mt-1">{{ $message }}</p>
            @enderror
        </div>

        <div class="mb-4">
        <label for="level" class="block text-sm font-medium text-gray-700 dark:text-gray-300">Nível</label>
            <select id="level" name="level" class="mt-1 block w-full px-3 py-2 border border-gray-300 rounded-md shadow-sm focus:outline-none focus:ring-blue-500 focus:border-blue-500 sm:text-sm dark:border-gray-700 dark:bg-gray-900 dark:text-gray-300 dark:focus:ring-blue-500 dark:focus:border-blue-500" required>
                <option value="1" {{ old('level', $player->level) == 1 ? 'selected' : '' }}>1</option>
                <option value="2" {{ old('level', $player->level) == 2 ? 'selected' : '' }}>2</option>
                <option value="3" {{ old('level', $player->level) == 3 ? 'selected' : '' }}>3</option>
                <option value="4" {{ old('level', $player->level) == 4 ? 'selected' : '' }}>4</option>
                <option value="5" {{ old('level', $player->level) == 5 ? 'selected' : '' }}>5</option>
            </select>
            @error('level')
                <p class="text-red-500 text-xs mt-1">{{ $message }}</p>
            @enderror
        </div>

        <div class="mb-4">
            <label for="goalkeeper" class="block text-sm font-medium text-gray-700 dark:text-gray-300">Goleiro</label>
            <select id="goalkeeper" name="goalkeeper" class="mt-1 block w-full px-3 py-2 border border-gray-300 rounded-md shadow-sm focus:outline-none focus:ring-blue-500 focus:border-blue-500 sm:text-sm dark:border-gray-700 dark:bg-gray-900 dark:text-gray-300 dark:focus:ring-blue-500 dark:focus:border-blue-500">
                <option value="1" {{ old('goalkeeper', $player->goalkeeper) ? 'selected' : '' }}>Sim</option>
                <option value="0" {{ !old('goalkeeper', $player->goalkeeper) ? 'selected' : '' }}>Não</option>
            </select>
            @error('goalkeeper')
                <p class="text-red-500 text-xs mt-1">{{ $message }}</p>
            @enderror
        </div>

        <div class="mb-4">
            <label for="is_confirmed" class="block text-sm font-medium text-gray-700 dark:text-gray-300">Comparecimento</label>
            <select id="is_confirmed" name="is_confirmed" class="mt-1 block w-full px-3 py-2 border border-gray-300 rounded-md shadow-sm focus:outline-none focus:ring-blue-500 focus:border-blue-500 sm:text-sm dark:border-gray-700 dark:bg-gray-900 dark:text-gray-300 dark:focus:ring-blue-500 dark:focus:border-blue-500">
                <option value="1" {{ old('is_confirmed', $player->is_confirmed) ? 'selected' : '' }}>Sim</option>
                <option value="0" {{ !old('is_confirmed', $player->is_confirmed) ? 'selected' : '' }}>Não</option>
            </select>
            @error('is_confirmed')
                <p class="text-red-500 text-xs mt-1">{{ $message }}</p>
            @enderror
        </div>

        <div class="flex items-center justify-end">
            <button type="submit" class="inline-flex items-center px-4 py-2 border border-transparent text-sm font-medium rounded-md shadow-sm text-white bg-blue-500 hover:bg-blue-600 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-blue-500 dark:focus:ring-blue-500">
                Atualizar
            </button>
        </div>
    </form>
</div>
@endsection
