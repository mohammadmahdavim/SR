<?php

namespace Database\Factories;

use App\Models\AgeGroup;
use App\Models\Level;
use App\Models\Organization;
use App\Models\User;
use Illuminate\Database\Eloquent\Factories\Factory;
use Illuminate\Support\Str;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\TeamProfile>
 */
class TeamProfileFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition()
    {
        return [
            'organization_id' => Organization::inRandomOrder()->first('id'),
            'age_group_id' => AgeGroup::inRandomOrder()->first('id'),
            'gender' => 'man',
            'type' => 'team',
            'level_id' =>Level::inRandomOrder()->first('id'),
            'game_location_id' =>Level::inRandomOrder()->first('id'),
            'created_by' => User::inRandomOrder()->first('id'),
            'ip_created_by'  => Str::random(10),
        ];
    }
}
