<?php

namespace Database\Factories;

use App\Models\Position;
use App\Models\TeamProfile;
use App\Models\User;
use App\Models\UserType;
use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\TeamProfileMember>
 */
class TeamProfileMemberFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition()
    {
        return [
            'team_profile_id' => TeamProfile::inRandomOrder()->first('id'),
            'user_id' => User::inRandomOrder()->first('id'),
            'user_type_id' => UserType::inRandomOrder()->first('id'),
            'status' => 'active',
            'number' => fake()->numerify('##'),
            'position_id' => Position::inRandomOrder()->first('id'),
            'start_date' => fake()->date,
            'end_date' => fake()->date,
            'created_by' => User::inRandomOrder()->first('id'),
            'ip_created_by'  => fake()->numerify('##########'),
        ];
    }
}
