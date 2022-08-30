<?php

namespace Database\Factories;

use App\Models\ProductType;
use App\Models\User;
use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\InventoryLog>
 */
class InventoryLogFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition()
    {
        return [
            'product_type_id' => ProductType::inRandomOrder()->first('id'),
            'input_date_time' => fake()->dateTime,
            'input_output_date' => fake()->dateTime,
            'status' => 'rent',
            'description' => str('60'),
            'responsible_user_id' => User::inRandomOrder()->first('id'),
            'created_by' => User::inRandomOrder()->first('id'),
            'ip_created_by'  => fake()->numerify('##########'),
        ];
    }
}
