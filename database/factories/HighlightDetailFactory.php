<?php

namespace Database\Factories;

use App\Models\EventPlayer;
use App\Models\Highlight;
use App\Models\Position;
use App\Models\Tag;
use App\Models\TeamProfile;
use App\Models\User;
use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\HighlightDetail>
 */
class HighlightDetailFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition()
    {
        return [
            'highlight_id' => Highlight::inRandomOrder()->first('id'),
            'team_profile_id' => TeamProfile::inRandomOrder()->first('id'),
            'event_player_id' => EventPlayer::inRandomOrder()->first('id'),
            'tag_id' => Tag::inRandomOrder()->first('id'),
            'position_id' => Position::inRandomOrder()->first('id'),
            'created_by' => User::inRandomOrder()->first('id'),
            'ip_created_by'  => fake()->numerify('##########'),
        ];
    }
}
