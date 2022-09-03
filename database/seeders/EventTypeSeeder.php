<?php

namespace Database\Seeders;

use App\Models\EventType;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class EventTypeSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $rows=[
            ['name'=>'official_match'],
            ['name'=>'friendly_match'],
            ['name'=>'training'],
            ['name'=>'tryout'],
            ['name'=>'test'],
        ];

        foreach ($rows as $row)
        {

            EventType ::firstOrCreate([
                'name'=>$row['name'],
            ]);
        }
    }
}
