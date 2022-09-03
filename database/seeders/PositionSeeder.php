<?php

namespace Database\Seeders;

use App\Models\Position;
use App\Models\Sport;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class PositionSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $positions = [
            'goal_keeper' => [
                'gk(goal_keeper)'
            ],
            'defender' => [
                'CB (center_back)',
                'RCB (right_center_back)',
                'LCB (left_center_back)',
                'RB (right_back)',
                'LB (left_back)',
            ],
            'midfielder' => [
                'CDM (center_defence_midfielder)',
                'CM (center_midfielder)',
                'RCM (right_center_midfielder)',
                'LCM (left_center_midfielder)',
                'CAM (center_attacking_midfielder)',
            ],
            'attacker' => [
                'RW (right_winger)',
                'lW (left_winger)',
                'CF (center_forward)',
            ],
        ];
        $sport=Sport::first();
        foreach ($positions as $key=>$position) {
            foreach ($position as $sub) {
                Position::firstOrcreate([
                    'parent_name'=>$key,
                    'name'=>$sub,
                    'sport_id'=>$sport->id,
                ]);
            }
        }
    }
}
