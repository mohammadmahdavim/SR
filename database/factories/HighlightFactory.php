<?php

namespace Database\Factories;

use App\Models\EventSection;
use App\Models\User;
use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Highlight>
 */
class HighlightFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition()
    {
        return [
            'event_section_id' => EventSection::inRandomOrder()->first('id'),
            'start_time' => $this->faker->time,
            'end_time' => $this->faker->time,
            'created_by' => User::inRandomOrder()->first('id'),
            'ip_created_by'  => fake()->numerify('##########'),
        ];
    }
}
