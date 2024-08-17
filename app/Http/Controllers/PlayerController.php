<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Player;

class PlayerController extends Controller
{
    public function index()
    {
        $players = Player::paginate(10); // para fazer um paginate
        return view('players.index', compact('players'));
    }

    public function create()
    {
        return view('players.create');
    }

    public function store(Request $request)
    {
        
        $request->validate([
            'name' => 'required|string|max:255',
            'level' => 'required|integer|min:1|max:5',
            'goalkeeper' => 'nullable',
            'is_confirmed' => 'nullable',
        ]);
        
        Player::create([
            'name' => $request->input('name'),
            'level' => $request->input('level'),
            'goalkeeper' => $request->has('goalkeeper'),
            'is_confirmed' => $request->has('is_confirmed'),  
        ]);

        return redirect()->route('players.index')->with('success', 'Jogador criado com sucesso!');
    }


    public function edit($id)
    {
        $player = Player::where('id', $id)->firstOrFail();
        return view('players.edit', compact('player'));
    }


    public function update(Request $request, $id)
{
   
    $player = Player::where('id', $id)->firstOrFail();
   
    $request->validate([
        'name' => 'required|string|max:255',
        'level' => 'required|integer|min:1|max:5',
        'goalkeeper' => 'nullable',
        'is_confirmed' => 'nullable'
    ]);

    $player->update([
        'name' => $request->name,
        'level' => $request->level,
        'goalkeeper' => $request->goalkeeper,
        'is_confirmed' => $request->is_confirmed,
    ]);

    return redirect()->route('players.index')->with('success', 'Jogador atualizado com sucesso!');
}

    public function destroy($id)
    {
        $player = Player::findOrFail($id);
        $player->delete();

        return redirect()->route('players.index')->with('success', 'Jogador excluído com sucesso!');
    }
}
