<?php

namespace Database\Seeders;

use App\Models\ProductType;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class ProductTypeSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $rows=[
            ['name'=>'polar'],
            ['name'=>'Veo 1'],
            ['name'=>'footbar'],
            ['name'=>'Veo 2'],
            ['name'=>'mount'],
            ['name'=>'tripod'],
            ['name'=>'sensor_strap'],

        ];

        foreach ($rows as $row)
        {

            ProductType ::firstOrCreate([
                'name'=>$row['name'],
            ]);
        }
    }
}
