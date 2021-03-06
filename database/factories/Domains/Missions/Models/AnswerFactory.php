<?php

namespace Database\Factories\Domains\Missions\Models;

use App\Domains\Missions\Models\Answer;
use App\Domains\Missions\Models\Mission;
use Illuminate\Database\Eloquent\Factories\Factory;

class AnswerFactory extends Factory
{
    /**
     * The name of the factory's corresponding model.
     *
     * @var string
     */
    protected $model = Answer::class;

    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        return [
            'mission_id' => Mission::factory(),
            'text'       => $this->faker->title,
            'is_correct' => $this->faker->boolean,
        ];
    }
}
