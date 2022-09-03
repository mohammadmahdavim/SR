<?php

namespace Database\Seeders;

use App\Models\Sport;
use App\Models\SubTag;
use App\Models\Tag;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class TagSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $tags = [
            'goal' => [
                'Free kick',
                'Penalty',
                'Header',
                'Volley',
                'Bicycle kick',
                'Long Distance Shot',
                'Panenka ',
                'Curve',
                'Backheel'

            ],
            'assist' => [
                'Cross',
                'Through Pass',
                'Vision',
                'Long Pass',
                'Direct Play',
                'Head Pass',
                'Long Range Kick',
                'Cut back',
                'First Touch',
                'Backheel',

            ],
            'pass' => [
                'Through Pass',
                'Vision',
                'Long Pass',
                'Direct Play',
                'Head Pass',
                'Smart Pass',
                'Launch',
                'Cross',
                'Curve',
                'Backheel',

            ],
            'shot' => [
                'Goal',
                'Saved',
                'Off Target',
                'Blocked',

            ],
            'Funny/Special moments' => [
                'Fun'
            ],
            'GK moves' => [
                'Goal Kick',
                'Hand Pass',
                'Long hand pass',
                'GK leaving Line',
                'Handling',
                'Sweeping',
                'GK Dribbling',
                'GK Tackle',
                'GK interception',
            ],
            'skill' => [
                'Nutmeg',
                'Double nutmeg',
                'Ball Controll',
                'Volley',
                'Bicycle kick',
                'Key Pass',
                'Hashtag',
                'Dribbling',

            ],
            'defence' => [
                'Interception',
                'Defensive Awareness',
                'Covering Depth',
                'Clearance',
                'Sliding Tackle',
                'Standing Tackle',
                'Aerial Duel',

            ],
            'save' => [
                'Super save',
                'Double save',
                'Tripple Save',
                'Foot Save',

            ],
            'duel' => [
                'Attacking Duel',
                'Defending Duel',
                'Air Duel',
                'Loose Ball Duel',

            ],
            'Foul' => [
                'Late Card Foul',
                'Out Of play Foul',
                'Simulation Foul',
                'Time Lost Foul',
                'Protest Foul',
                'Violent Foul',
                'Hand Foul',
                'Dangerous Act',
            ],
            'out of play' => [
                'Throw in',
                'Free Kick',
                'Corner Kick',
                'Goal Kick',
                'Offside',
                'Penalty Kick',
            ],
            'possession' => [
                'Possession',
                'Controlled Possession',
                'ADT (Attack Defense Transition)',
                'DAT (Defence Attack Transition)',
                'OA (Organized Attack)',
                'OD (Organized Defense)',
                'Retain Pressure',
                'Counter Attack',
                'Combination Play',
                'Danger Zone Entry',
                'Penalty Area Entry',
                'Pressure',
                'Playing out',
            ],
        ];
        $sport=Sport::first();
        foreach ($tags as $key => $tags) {

            $id = Tag::firstOrCreate([
                'name' => $key,
                'sport_id' => $sport->id,
                'type' => 'individual',
                'plane' => 'basic',
            ])->id;
            foreach ($tags as $tag) {
                SubTag::create([
                    'tag_id' => $id,
                    'name' => $tag,
                ]);
            }
        }
    }
}
