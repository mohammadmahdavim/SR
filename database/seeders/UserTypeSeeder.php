<?php

namespace Database\Seeders;

use App\Models\UserType;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class UserTypeSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $rows=[
            ['name'=>'player'],
            ['name'=>'scout'],
            ['name'=>'parent'],
            ['name'=>'agent'],
            ['name'=>'coach'],
            ['name'=>'analyst'],
        ];

        foreach ($rows as $row)
        {

            UserType ::firstOrCreate([
                'name'=>$row['name'],
            ]);
        }
    }
}
