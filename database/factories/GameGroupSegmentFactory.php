<?php

namespace Database\Factories;

use App\Models\GameGroupSeason;
use App\Models\User;
use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\GameGroupSegment>
 */
class GameGroupSegmentFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition()
    {
        return [
            'game_group_season_id' => GameGroupSeason::inRandomOrder()->first('id'),
            'stage' => 'League',
            'name' => $this->faker->title,
            'sort_index' => fake()->numerify('#'),
            'created_by' => User::inRandomOrder()->first('id'),
            'ip_created_by'  => fake()->numerify('##########'),
        ];
    }
}
