<?php

namespace Database\Seeders;

use App\Models\AgeGroup;
use App\Models\Sport;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class AgeGroupSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {

        $rows = [
            ['name' => 'football'],
            ['name' => 'futsal'],
            ['name' => 'beach_football'],
        ];

        foreach ($rows as $row) {
            $sport = Sport::inRandomOrder()->first();
            AgeGroup::firstOrCreate([
                'name' => $row['name'],
                'sport_id' => $sport->id,
            ]);
        }
    }
}
