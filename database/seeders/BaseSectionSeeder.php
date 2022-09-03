<?php

namespace Database\Seeders;

use App\Models\BaseSection;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class BaseSectionSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $rows=[
            ['name'=>'first_half'],
            ['name'=>'second_half'],
            ['name'=>'extra_time'],
            ['name'=>'penalty_kick'],
            ['name'=>'quarter 1'],
            ['name'=>'quarter 2'],
            ['name'=>'quarter 3'],
            ['name'=>'quarter 4'],
        ];

        foreach ($rows as $row)
        {

            BaseSection ::firstOrCreate([
                'name'=>$row['name'],
            ]);
        }
    }
}
