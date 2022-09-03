<?php

namespace Database\Seeders;

use App\Models\Contract;
use App\Models\Permission;
use App\Models\Role;
use App\Models\User;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class RolePermissionSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {

        $data = [
            'role' => [
                'name' => 'account_manager',
                'contract_id' => Contract::inRandomOrder()->first('id'),
                'permissions' => [
                    [
                        'name' => 'list_team',
                        'ui_menu_key' => 'list_team'
                    ],
                    [
                        'name' => 'list_player',
                        'ui_menu_key' => 'list_team'
                    ],
                    [
                        'name' => 'list_event',
                        'ui_menu_key' => 'list_team'
                    ],

                ],
            ]
        ];

        $role=Role::create([
            'name'=>$data['role']['name'],
            'contract_id'=>$data['role']['contract_id']->id,
            'created_by' => User::inRandomOrder()->first('id')->id,
            'ip_created_by'  => fake()->numerify('##########'),
        ]);
        foreach ($data['role']['permissions'] as $permission)
        {
            $permissionExit=Permission::where('name',$permission['name'])->first();
            if (!$permissionExit)
            {
                $permissionExit=Permission::create([
                    'name'=>$permission['name'],
                    'ui_menu_key'=>$permission['ui_menu_key'],
                ]);
            }
            $role->permissions()->attach($permissionExit,[
                'created_by' => User::inRandomOrder()->first('id')->id,
                'ip_created_by'  => fake()->numerify('##########'),
            ]);
        }
    }
}
