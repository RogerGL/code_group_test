@extends('layout.app')

@section('content')
<div class="relative overflow-x-auto shadow-md sm:rounded-lg">
    @foreach($teams as $index => $team)
    <div class="mb-4">
        <h2 class="text-lg font-medium text-gray-900 dark:text-white">Time {{ $index + 1 }}</h2>
        <table class="w-full text-sm text-left rtl:text-right text-gray-500 dark:text-gray-400">
            <thead class="text-xs text-gray-700 uppercase bg-gray-50 dark:bg-gray-700 dark:text-gray-400">
                <tr>
                    <th scope="col" class="px-6 py-3">Nome Jogador</th>
                    <th scope="col" class="px-6 py-3">Nível</th>
                    <th scope="col" class="px-6 py-3">Goleiro</th>
                </tr>
            </thead>
            <tbody>
                @foreach($team as $player)
                <tr class="odd:bg-white odd:dark:bg-gray-900 even:bg-gray-50 even:dark:bg-gray-800 border-b dark:border-gray-700">
                    <th scope="row" class="px-6 py-4 font-medium text-gray-900 whitespace-nowrap dark:text-white">{{ $player->name }}</th>
                    <td class="px-6 py-4">{{ $player->level }}</td>
                    <td class="px-6 py-4">{{ $player->goalkeeper ? 'Sim' : 'Não' }}</td>
                </tr>
                @endforeach
            </tbody>
        </table>
    </div>
    @endforeach
</div>
@endsection
