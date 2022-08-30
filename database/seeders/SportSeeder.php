<?php

namespace Database\Seeders;

use App\Models\Sport;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class SportSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $rows=[
            ['name'=>'football'],
            ['name'=>'futsal'],
            ['name'=>'beach_football'],
        ];

        foreach ($rows as $row)
        {

            Sport::firstOrCreate([
                'name'=>$row['name'],
            ]);
        }
    }
}
