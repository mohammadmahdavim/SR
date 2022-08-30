<?php

namespace Database\Factories;

use App\Models\GameGroup;
use App\Models\User;
use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Model>
 */
class GameGroupSeasonFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition()
    {
        return [
            'game_group_id' => GameGroup::inRandomOrder()->first('id'),
            'from_year' => fake()->numberBetween(2015,2022),
            'to_year' => fake()->numberBetween(2015,2022),
            'from_date' => fake()->date,
            'to_date' => fake()->date,
            'created_by' => User::inRandomOrder()->first('id'),
            'ip_created_by'  => fake()->numerify('##########'),
        ];
    }
}
