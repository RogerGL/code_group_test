<?php

namespace App\Http\Controllers;

use App\Models\Player;
use Illuminate\Http\Request;

class TeamController extends Controller
{
    public function index()
    {
        return view('teams.index');
    }

    public function drawTeams(Request $request)
    {
        $validated = $request->validate([
            'players_per_team' => 'required|integer|min:1',
        ]);

        $playersPerTeam = $validated['players_per_team'];

        // Filtra apenas os jogadores confirmados
        $confirmedPlayers = Player::where('is_confirmed', true)->get();

        // Verifica se há jogadores suficientes
        if ($confirmedPlayers->count() < $playersPerTeam * 2) {
            return back()->withErrors('Número de jogadores confirmados insuficiente para formar times.');
        }

        // Separa os goleiros dos demais jogadores
        $goalkeepers = $confirmedPlayers->where('goalkeeper', true);
        $regularPlayers = $confirmedPlayers->where('goalkeeper', false);

        // Verifica se há pelo menos um goleiro para cada time
        if ($goalkeepers->count() < ceil($confirmedPlayers->count() / $playersPerTeam)) {
            return back()->withErrors('Número insuficiente de goleiros para distribuir em todos os times.');
        }

        // Embaralha os jogadores e divide-os em times
        $shuffledRegularPlayers = $regularPlayers->shuffle();
        $teams = $shuffledRegularPlayers->chunk($playersPerTeam - 1);

        // Adiciona um goleiro a cada time
        foreach ($teams as $index => $team) {
            if ($goalkeepers->isNotEmpty()) {
                $team->push($goalkeepers->shift());
            }
        }

        // Se houver mais goleiros do que times, distribui os goleiros restantes
        while ($goalkeepers->isNotEmpty()) {
            foreach ($teams as $team) {
                if ($goalkeepers->isEmpty()) {
                    break;
                }
                if ($team->where('goalkeeper', true)->count() < 1) {
                    $team->push($goalkeepers->shift());
                }
            }
        }

        // Se o último time tiver menos jogadores do que o necessário, redistribui os jogadores
        if ($teams->count() > 2 && $teams->last()->count() < $playersPerTeam) {
            $remainingPlayers = $teams->pop();
            $teams->transform(function ($team) use (&$remainingPlayers, $playersPerTeam) {
                while ($remainingPlayers->isNotEmpty() && $team->count() < $playersPerTeam) {
                    $team->push($remainingPlayers->shift());
                }
                return $team;
            });
        }

        // Verifica se há mais de um goleiro em algum time
        foreach ($teams as $team) {
            $goalkeeperCount = $team->where('goalkeeper', true)->count();
            if ($goalkeeperCount > 1) {
                return back()->withErrors('Mais de um goleiro em um dos times. Refaça o sorteio.');
            }
        }

        // Verifica se todos os times têm pelo menos um goleiro
        foreach ($teams as $team) {
            if ($team->where('goalkeeper', true)->isEmpty()) {
                return back()->withErrors('Cada time deve ter pelo menos um goleiro.');
            }
        }

        // Retorna a view com os times sorteados
        return view('teams.result', compact('teams'));
    }
}
