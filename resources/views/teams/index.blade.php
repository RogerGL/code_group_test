@extends('layout.app')

@section('content')
<div class="relative overflow-x-auto shadow-md sm:rounded-lg">
    <div class="mt-4">
        <form action="{{ route('teams.draw') }}" method="POST">
            @csrf
            <label for="players_per_team" class="block text-lg font-medium text-black ">Número de jogadores por time:</label>
            <input type="number" name="players_per_team" id="players_per_team" class="mt-1 block w-full sm:text-sm border-gray-300 rounded-md shadow-sm">
            <button type="submit" class="mt-2 inline-flex items-center px-4 py-2 border border-transparent text-sm font-medium rounded-md shadow-sm text-white bg-blue-600 hover:bg-blue-700">Sortear Times</button>
        </form>
    </div>
</div>
@endsection
