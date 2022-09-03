<?php

namespace Database\Factories;

use App\Models\ContractProductDetail;
use App\Models\Event;
use App\Models\Position;
use App\Models\TeamProfile;
use App\Models\User;
use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\EventPlayer>
 */
class EventPlayerFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition()
    {
        return [
            'event_id' => Event::inRandomOrder()->first('id'),
            'team_profile_member_id' => TeamProfile::inRandomOrder()->first('id'),
            'position_id' => Position::inRandomOrder()->first('id'),
            'number' => fake()->numerify('##'),
            'polar_sensor_id' => ContractProductDetail::inRandomOrder()->first('id'),
            'footbar_sensor_id' => ContractProductDetail::inRandomOrder()->first('id'),
            'player_status' =>'available',
            'created_by' => User::inRandomOrder()->first('id'),
            'ip_created_by'  => fake()->numerify('##########'),
        ];
    }
}
