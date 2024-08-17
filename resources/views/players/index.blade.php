@extends('layout.app')

@section('content')
<div class="relative overflow-x-auto shadow-md sm:rounded-lg">
    <table class="w-full text-sm text-left rtl:text-right text-gray-500 dark:text-gray-400">
        <thead class="text-xs text-gray-700 uppercase bg-gray-50 dark:bg-gray-700 dark:text-gray-400">
            <tr>
                <th scope="col" class="px-6 py-3">
                    Nome Jogador
                </th>
                <th scope="col" class="px-6 py-3">
                    Nível
                </th>
                <th scope="col" class="px-6 py-3">
                    Goleiro
                </th>
                <th scope="col" class="px-6 py-3">
                    Comparecimento
                </th>
                <th scope="col" class="px-6 py-3">
                    Ações
                </th>
            </tr>
        </thead>
        <tbody>
            @foreach($players as $player)
            <tr class="odd:bg-white odd:dark:bg-gray-900 even:bg-gray-50 even:dark:bg-gray-800 border-b dark:border-gray-700">
                <th scope="row" class="px-6 py-4 font-medium text-gray-900 whitespace-nowrap dark:text-white">
                    {{ $player->name }}
                </th>
                <td class="px-6 py-4">
                    {{ $player->level }}
                </td>
                <td class="px-6 py-4">
                    {{ $player->goalkeeper ? 'Sim' : 'Não' }}
                </td>
                <td class="px-6 py-4">
                    {{ $player->is_confirmed ? 'Sim' : 'Não' }}
                </td>
                <td class="px-6 py-4">
                    <a href="{{ route('players.edit', $player->id) }}" class="font-medium text-blue-600 dark:text-blue-500 hover:underline">Editar</a>
                    
                    <form action="{{ route('players.destroy', $player->id) }}" method="POST" class="inline-block ml-2">
                        @csrf
                        @method('DELETE')
                        <button type="submit" class="font-medium text-red-600 dark:text-red-500 hover:underline">Excluir</button>
                    </form>
                </td>
            </tr>
            @endforeach
        </tbody>
    </table>
    <div class="mt-4">
        {{ $players->links() }}
    </div>
</div>
@endsection
