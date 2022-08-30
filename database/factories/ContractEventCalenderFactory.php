<?php

namespace Database\Factories;

use App\Models\BaseService;
use App\Models\ProductType;
use App\Models\TeamProfile;
use App\Models\User;
use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\ContractEventCalender>
 */
class ContractEventCalenderFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition()
    {
        return [
            'team_profile_id' => TeamProfile::inRandomOrder()->first('id'),
            'product_type_id' => ProductType::inRandomOrder()->first('id'),
            'base_service_id' => BaseService::inRandomOrder()->first('id'),
            'date' => fake()->date(),
            'from_time' => fake()->dateTime,
            'to_time' => fake()->dateTime,
            'description' => fake()->text,
            'created_by' => User::inRandomOrder()->first('id'),
            'ip_created_by'  => fake()->numerify('##########'),
        ];
    }
}
