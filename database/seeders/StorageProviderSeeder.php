<?php

namespace Database\Seeders;

use App\Models\StorageProvider;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class StorageProviderSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $rows=[
            ['name'=>'aravn'],
        ];

        foreach ($rows as $row)
        {

            StorageProvider ::firstOrCreate([
                'name'=>$row['name'],
            ]);
        }
    }
}
