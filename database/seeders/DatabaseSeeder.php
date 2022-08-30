<?php

namespace Database\Seeders;

// use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use App\Models\BaseService;
use App\Models\FieldType;
use App\Models\OrganizationType;
use App\Models\StorageProvider;
use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
        \App\Models\User::factory(1)->create();

        $this->call([
            OrganizationTypeSeeder::class,
            RegionSeeder::class,
            StorageProviderSeeder::class,
            LevelSeeder::class,
            SportSeeder::class,
            AgeGroupSeeder::class,
            BaseServiceSeeder::class,
            ProductTypeSeeder::class,
            FieldTypeSeeder::class,
        ]);

        \App\Models\Organization::factory(30)->create();
        \App\Models\Contract::factory(50)->create();
        \App\Models\InventoryProduct::factory(100)->create();
        \App\Models\InventoryLog::factory(500)->create();
        \App\Models\ContractServiceDetail::factory(500)->create();
        \App\Models\ContractProductDetail::factory(500)->create();
        \App\Models\GameLocation::factory(10)->create();
        \App\Models\TeamProfile::factory(100)->create();
        \App\Models\ContractEventCalender::factory(1000)->create();
        \App\Models\GameGroup::factory(10)->create();
        \App\Models\GameGroupSeason::factory(50)->create();
        \App\Models\GameGroupSegment::factory(500)->create();

    }
}
