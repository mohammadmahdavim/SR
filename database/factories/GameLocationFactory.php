<?php

namespace Database\Factories;

use App\Models\FieldType;
use App\Models\Region;
use App\Models\User;
use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\GameLocation>
 */
class GameLocationFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition()
    {
        return [
            'name' => $this->faker->name,
            'field_type_id' => FieldType::inRandomOrder()->first('id'),
            'lat' => fake()->numerify('######'),
            'lan' => fake()->numerify('######'),
            'region_id' => Region::inRandomOrder()->first('id'),
            'address' => $this->faker->address,
            'image_url' => str('60'),
            'created_by' => User::inRandomOrder()->first('id'),
            'ip_created_by'  => fake()->numerify('##########'),
        ];
    }
}
