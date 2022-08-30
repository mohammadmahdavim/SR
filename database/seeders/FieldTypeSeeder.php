<?php

namespace Database\Seeders;

use App\Models\FieldType;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class FieldTypeSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $rows=[
            ['name'=>'natural_grass'],
            ['name'=>'artificial_grass'],
            ['name'=>'salon'],
        ];

        foreach ($rows as $row)
        {

            FieldType ::firstOrCreate([
                'name'=>$row['name'],
            ]);
        }
    }
}
