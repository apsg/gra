<?php
namespace App\Domains\Missions\Repositories;

use App\Domains\Missions\Models\Mission;
use App\Models\User;
use Illuminate\Support\Str;

class MissionRepository
{
    public function create(string $title, string $filePath, User $user = null, array $answers = []) : Mission
    {
        /** @var Mission $mission */
        $mission = Mission::create([
            'title'   => $title,
            'user_id' => $user->id,
            'slug'    => Str::slug($title),
            'image'   => $filePath,
        ]);

        if (!empty($answers)) {
            foreach ($answers as $answer) {
                $mission->answers()->create([
                    'text'       => object_get($answer, 'text'),
                    'is_correct' => object_get($answer, 'isCorrect'),
                ]);
            }
        }

        return $mission;
    }
}
