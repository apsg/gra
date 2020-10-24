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
                'title' => $missionData['title'],
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
                'title'   => 'Przepowiadanie przyszłości',
                'answers' => [
                    [
                        'text'       => "Przepowiadanie przyszłości",
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
            [
                'slug'    => 'm3',
                'image'   => 'images/missions/czytanie_w_myslach.jpg',
                'title'   => 'Czytanie w myślach',
                'answers' => [
                    [
                        'text'       => "Czytanie w myślach",
                        'is_correct' => true,
                    ],
                    [
                        'text'       => "Katastrofizacja",
                        'is_correct' => false,
                    ],
                    [
                        'text'       => "Pomijanie pozytywów",
                        'is_correct' => false,
                    ],
                ],
            ],
            [
                'slug'    => 'm4',
                'image'   => 'images/missions/emocjonalne_uzasadnienia.jpg',
                'title'   => 'Emocjonalne uzasadnienia',
                'answers' => [
                    [
                        'text'       => "Emocjonalne uzasadnienia",
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
            [
                'slug'    => 'm5',
                'image'   => 'images/missions/etykietowanie.jpg',
                'title'   => 'Etykietowanie',
                'answers' => [
                    [
                        'text'       => "Etykietowanie",
                        'is_correct' => true,
                    ],
                    [
                        'text'       => "Czytanie w myślach",
                        'is_correct' => false,
                    ],
                    [
                        'text'       => "Uzasadnienie emocjonalne",
                        'is_correct' => false,
                    ],
                ],
            ],
            [
                'slug'    => 'm6',
                'image'   => 'images/missions/katastrofizacja.jpg',
                'title'   => 'Katastrofizacja',
                'answers' => [
                    [
                        'text'       => "Katastrofizacja",
                        'is_correct' => true,
                    ],
                    [
                        'text'       => "Personalizacja",
                        'is_correct' => false,
                    ],
                    [
                        'text'       => "Czytanie w myślach",
                        'is_correct' => false,
                    ],
                ],
            ],

            [
                'slug'    => 'm7',
                'image'   => 'images/missions/personalizacja.jpg',
                'title'   => 'Personalizacja',
                'answers' => [
                    [
                        'text'       => "Personalizacja",
                        'is_correct' => true,
                    ],
                    [
                        'text'       => "Etykietowanie",
                        'is_correct' => false,
                    ],
                    [
                        'text'       => "Przeskakiwanie do konkluzji",
                        'is_correct' => false,
                    ],
                ],
            ],

            [
                'slug'    => 'm8',
                'image'   => 'images/missions/pomijanie_pozytywow.jpg',
                'title'   => 'Pomijanie pozytywów',
                'answers' => [
                    [
                        'text'       => "Pomijanie pozytywów",
                        'is_correct' => true,
                    ],
                    [
                        'text'       => "Czytanie w myślach",
                        'is_correct' => false,
                    ],
                    [
                        'text'       => "Emocjonalne uzasadnianie",
                        'is_correct' => false,
                    ],
                ],
            ],

            [
                'slug'    => 'm9',
                'image'   => 'images/missions/przepowiadanie_przyszlosci.jpg',
                'title'   => 'Przepowiadanie przyszłości',
                'answers' => [
                    [
                        'text'       => "Przepowiadanie przyszłości",
                        'is_correct' => true,
                    ],
                    [
                        'text'       => "Personalizacja",
                        'is_correct' => false,
                    ],
                    [
                        'text'       => "Myślenie czarno-białe",
                        'is_correct' => false,
                    ],
                ],
            ],
        ];
    }
}
