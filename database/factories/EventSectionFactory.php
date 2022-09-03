<?php

namespace Database\Factories;

use App\Models\BaseSection;
use App\Models\User;
use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\EventSection>
 */
class EventSectionFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition()
    {
        return [
            'base_section_id' => BaseSection::inRandomOrder()->first('id'),
            'video_start_date_time' => fake()->dateTime(),
            'video_end_date_time' => fake()->dateTime(),
            'start_date_time' => fake()->dateTime(),
            'end_date_time' => fake()->dateTime(),
            'video_link' => $this->faker->url(),
            'created_by' => User::inRandomOrder()->first('id'),
            'ip_created_by'  => fake()->numerify('##########'),
        ];
    }
}
