<?php

namespace App\Domains\Missions\Seeders;

use App\Domains\Missions\Models\Answer;
use App\Domains\Missions\Models\Mission;
use Illuminate\Database\Seeder;

class MissionsSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        foreach ($this->missions() as $missionData) {
            /** @var Mission $mission */
            $mission = Mission::firstOrCreate([
                'slug' => $missionData['slug'],
            ], [
                'image' => $missionData['image'],
            ]);

            foreach ($missionData['answers'] as $answer) {
                Answer::firstOrCreate([
                    'mission_id' => $mission->id,
                    'text'       => $answer['text'],
                    'is_correct' => $answer['is_correct'],
                ]);
            }
        }
    }

    public function missions() : array
    {
        return [
            [
                'slug'    => 'm1',
                'image'   => 'images/missions/m1.jpg',
                'answers' => [
                    [
                        'text'       => "Nadmierna generalizacja",
                        'is_correct' => true,
                    ],
                    [
                        'text'       => "Myślenie czarno-białe",
                        'is_correct' => false,
                    ],
                    [
                        'text'       => "Pomijanie pozytywów",
                        'is_correct' => false,
                    ],
                ],
            ],
        ];
    }
}
