<?php

namespace Database\Seeders;

use App\Models\BaseService;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class BaseServiceSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $rows=[
            ['name'=>'video_recording'],
            ['name'=>'peformance_tracking'],
            ['name'=>'tec / tac'],
            ['name'=>'social_media_clips'],
            ['name'=>'application'],
            ['name'=>'video_editing'],
            ['name'=>'local_operator'],
            ['name'=>'online_operator'],
            ['name'=>'live_streaming'],
            ['name'=>'website_design'],
        ];

        foreach ($rows as $row)
        {

            BaseService ::firstOrCreate([
                'name'=>$row['name'],
            ]);
        }
    }
}
