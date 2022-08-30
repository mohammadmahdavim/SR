<?php

namespace Database\Seeders;

use App\Models\Level;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class LevelSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $rows=[
            ['name'=>'pro'],
            ['name'=>'semi-pro'],
            ['name'=>'amateur'],
        ];

        foreach ($rows as $row)
        {

            Level ::firstOrCreate([
                'name'=>$row['name'],
            ]);
        }
    }
}
