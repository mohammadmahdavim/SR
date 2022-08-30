<?php

namespace Database\Seeders;

use App\Models\Region;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class RegionSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $rows=[
            ['name'=>'asia','type_id'=>'continent','parent_id'=>null],
        ];

        foreach ($rows as $row)
        {

            Region::firstOrCreate([
                'name'=>$row['name'],
                'type_id'=>$row['type_id'],
                'parent_id'=>$row['parent_id']
            ]);
        }
    }
}
