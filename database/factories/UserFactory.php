<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Str;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\User>
 */
class UserFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition()
    {
        return [
            'english_first_name' => fake()->name(),
            'english_last_name' => fake()->name(),
            'second_first_name' => fake()->name(),
            'second_last_name' => fake()->name(),
            'alias_name' => fake()->name(),
            'user_name' => fake()->userName(),
            'password' => Hash::make('1234567890'), // password
            'ip_created_by' => Str::random(10),

        ];
    }

    /**
     * Indicate that the model's email address should be unverified.
     *
     * @return static
     */
    public function unverified()
    {
        return $this->state(function (array $attributes) {
            return [
                'email_verified_at' => null,
            ];
        });
    }
}
