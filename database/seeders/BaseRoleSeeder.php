<?php

namespace Database\Seeders;

use App\Models\BaseRole;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class BaseRoleSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $rows=[
            ['name'=>'super_admin'],
            ['name'=>'admin'],
            ['name'=>'account_manager'],
            ['name'=>'online_operator'],
            ['name'=>'offline_operator'],
            ['name'=>'video_editor'],
        ];

        foreach ($rows as $row)
        {

            BaseRole ::firstOrCreate([
                'name'=>$row['name'],
            ]);
        }
    }
}
