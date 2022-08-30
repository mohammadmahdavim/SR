<?php

namespace Database\Factories;

use App\Models\Region;
use App\Models\Sport;
use App\Models\User;
use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\GameGroup>
 */
class GameGroupFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition()
    {
        return [
            'region_id' => Region::inRandomOrder()->first('id'),
            'sport_id' => Sport::inRandomOrder()->first('id'),
            'name' => fake()->name,
            'created_by' => User::inRandomOrder()->first('id'),
            'ip_created_by'  => fake()->numerify('##########'),
        ];
    }
}
