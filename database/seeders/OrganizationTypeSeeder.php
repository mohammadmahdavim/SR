<?php

namespace Database\Seeders;

use App\Models\OrganizationType;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class OrganizationTypeSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $rows=[
            ['name'=>'federation','type'=>'B2B'],
            ['name'=>'club','type'=>'B2B'],
            ['name'=>'company','type'=>'B2B'],
            ['name'=>'person','type'=>'B2c'],
            ['name'=>'football_school','type'=>'B2B'],
            ['name'=>'academy','type'=>'B2B'],
            ['name'=>'media','type'=>'B2B'],
            ['name'=>'parent','type'=>'B2c'],
            ['name'=>'university_school','type'=>'B2B'],
            ['name'=>'corporations','type'=>'B2B'],
        ];

        foreach ($rows as $row)
        {
            OrganizationType::firstOrCreate([
                'name'=>$row['name'],
                'personality_type'=>$row['type']
            ]);
        }
    }
}
