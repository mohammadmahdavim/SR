<?php

namespace Database\Factories;

use App\Models\Contract;
use App\Models\EventType;
use App\Models\GameGroupSegment;
use App\Models\GameLocation;
use App\Models\Level;
use App\Models\TeamProfile;
use App\Models\User;
use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Event>
 */
class EventFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition()
    {
        return [
            'event_type_id' => EventType::inRandomOrder()->first('id'),
            'game_group_segment_id' => GameGroupSegment::inRandomOrder()->first('id'),
            'contract_id' => Contract::inRandomOrder()->first('id'),
            'home_team_profile_id' => TeamProfile::inRandomOrder()->first('id'),
            'away_team_profile_id' => TeamProfile::inRandomOrder()->first('id'),
            'game_location_id' => GameLocation::inRandomOrder()->first('id'),
            'level_id' => Level::inRandomOrder()->first('id'),
            'date' => fake()->date,
            'created_by' => User::inRandomOrder()->first('id'),
            'ip_created_by'  => fake()->numerify('##########'),
        ];
    }
}
