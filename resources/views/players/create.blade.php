@extends('layout.app')

@section('content')
<div class="container mx-auto flex justify-center my-8">
    <div class="w-full max-w-lg">
        <form action="{{ route('players.store') }}" method="POST" class="bg-white shadow-md rounded px-8 pt-6 pb-8 mb-4">
            @csrf
            <div class="mb-4">
                <label class="block text-gray-700 text-sm font-bold mb-2" for="name">
                    Nome
                </label>
                <input class="shadow appearance-none border rounded w-full py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:shadow-outline" id="name" type="text" placeholder="Nome do Jogador" name="name">
            </div>
            <div class="mb-4">
                <label class="block text-gray-700 text-sm font-bold mb-2" for="level">
                    Nível
                </label>
                <select class="block appearance-none w-full bg-white border border-gray-400 hover:border-gray-500 px-4 py-2 pr-8 rounded shadow leading-tight focus:outline-none focus:shadow-outline" id="level" name="level">
                    <option value="1">1 - Pior</option>
                    <option value="2">2</option>
                    <option value="3">3</option>
                    <option value="4">4</option>
                    <option value="5">5 - Melhor</option>
                </select>
            </div>
            <div class="mb-4">
                <label class="block text-gray-700 text-sm font-bold mb-2" for="goalkeeper">
                    Goleiro
                </label>
                <div class="flex items-center">
                    <input class="mr-2 leading-tight" type="checkbox" id="goalkeeper" name="goalkeeper">
                    <span class="text-sm">Sim</span>
                </div>
            </div>
            <div class="mb-4">
                <label class="block text-gray-700 text-sm font-bold mb-2" for="confirmed">
                    Confirmou Presença
                </label>
                <div class="flex items-center">
                    <input class="mr-2 leading-tight" type="checkbox" id="confirmed" name="is_confirmed">
                    <span class="text-sm">Sim</span>
                </div>
            </div>
            <div class="flex items-center justify-between">
                <button class="bg-blue-500 hover:bg-blue-700 text-white font-bold py-2 px-4 rounded focus:outline-none focus:shadow-outline" type="submit">
                    Salvar
                </button>
            </div>
        </form>
    </div>
</div>
@endsection
