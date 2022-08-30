<?php

namespace Database\Factories;

use App\Models\BaseService;
use App\Models\Contract;
use App\Models\ProductType;
use App\Models\User;
use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\ContractServiceDetail>
 */
class ContractServiceDetailFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition()
    {
        return [
            'service_id' => BaseService::inRandomOrder()->first('id'),
            'contract_id' => Contract::inRandomOrder()->first('id'),
            'product_type_id' => ProductType::inRandomOrder()->first('id'),
            'order_count' => fake()->numerify('###'),
            'order_unit' => 'hour',
            'description' => str('60'),
            'created_by' => User::inRandomOrder()->first('id'),
            'ip_created_by'  => fake()->numerify('##########'),
        ];
    }
}
