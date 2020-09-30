<?php

namespace Database\Factories;

use App\Domains\Missions\Models\Mission;
use App\Models\User;
use Illuminate\Database\Eloquent\Factories\Factory;

class MissionFactory extends Factory
{
    /**
     * The name of the factory's corresponding model.
     *
     * @var string
     */
    protected $model = Mission::class;

    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        return [
            'image'   => $this->faker->imageUrl(),
            'slug'    => $this->faker->slug,
            'user_id' => $this->faker->boolean ? User::factory() : null,
            'title'   => $this->faker->title,
        ];
    }
}
