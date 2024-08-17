<?php

namespace Tests\Unit;

use Tests\TestCase;
use App\Models\Player;
use Illuminate\Foundation\Testing\RefreshDatabase;

class PlayerTest extends TestCase
{
    use RefreshDatabase;

    public function test_can_create_player()
    {
        $player = Player::create([
            'name' => 'João',
            'level' => 1, // Valor inteiro
            'goalkeeper' => true,
            'is_confirmed' => true,
        ]);

        $this->assertDatabaseHas('players', [
            'name' => 'João',
            'level' => 1,
        ]);
    }

    public function test_can_identify_goalkeeper()
    {
        $goalkeeper = Player::create([
            'name' => 'Carlos',
            'level' => 2,
            'goalkeeper' => true,
            'is_confirmed' => true,
        ]);

        $this->assertTrue($goalkeeper->goalkeeper);
    }

    public function test_can_identify_confirmed_players()
    {
        Player::create([
            'name' => 'Maria',
            'level' => 3,
            'goalkeeper' => false,
            'is_confirmed' => true,
        ]);

        $confirmedPlayers = Player::where('is_confirmed', true)->get();

        $this->assertCount(1, $confirmedPlayers);
    }

    public function test_returns_only_confirmed_players()
    {
        Player::create([
            'name' => 'Ana',
            'level' => 4,
            'goalkeeper' => false,
            'is_confirmed' => false,
        ]);

        Player::create([
            'name' => 'Lucia',
            'level' => 5,
            'goalkeeper' => false,
            'is_confirmed' => true,
        ]);

        $confirmedPlayers = Player::where('is_confirmed', true)->get();

        $this->assertCount(1, $confirmedPlayers);
    }

    public function test_has_correct_level_attribute()
    {
        $player = Player::create([
            'name' => 'Lucia',
            'level' => 1,
            'goalkeeper' => false,
            'is_confirmed' => true,
        ]);

        $this->assertEquals(1, $player->level);
    }
}

