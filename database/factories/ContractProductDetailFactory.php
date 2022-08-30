<?php

namespace Database\Factories;

use App\Models\BaseService;
use App\Models\Contract;
use App\Models\InventoryLog;
use App\Models\ProductType;
use App\Models\User;
use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\ContractProductDetail>
 */
class ContractProductDetailFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition()
    {
        return [
            'inventory_log_id' => InventoryLog::inRandomOrder()->first('id'),
            'contract_id' => Contract::inRandomOrder()->first('id'),
            'description' => str('60'),
            'created_by' => User::inRandomOrder()->first('id'),
            'ip_created_by'  => fake()->numerify('##########'),
        ];
    }
}
