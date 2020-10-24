<?php
namespace App\Domains\Games\Seeders;

use App\Domains\Games\Models\Game;
use App\Domains\Missions\Models\Mission;
use Illuminate\Database\QueryException;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Str;

class GameSeeder extends Seeder
{
    public function run()
    {
        foreach ($this->games() as $gameData) {
            $game = Game::firstOrCreate([
                'title'   => $gameData['title'],
                'user_id' => null,
            ], [
                'token' => Str::random(),
            ]);

            foreach ($gameData['missions'] as $slug) {
                $mission = Mission::where('slug', $slug)->first();

                try {
                    DB::table('game_mission')
                        ->insert([
                            'game_id'    => $game->id,
                            'mission_id' => $mission->id,
                        ]);
                } catch (QueryException $exception) {
                    // already exists
                }
            }
        }
    }

    protected function games() : array
    {
        return [
            [
                'title'    => 'Gra pierwsza',
                'missions' => [
                    'm1',
                    'm3',
                    'm4',
                    'm5',
                    'm6',
                    'm7',
                    'm8',
                    'm9',
                ],
            ],
        ];
    }
}
