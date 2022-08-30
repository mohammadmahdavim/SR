<?php

namespace Database\Factories;

use App\Models\Level;
use App\Models\OrganizationType;
use App\Models\Region;
use App\Models\User;
use Illuminate\Database\Eloquent\Factories\Factory;
use Illuminate\Support\Str;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Organization>
 */
class OrganizationFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition()
    {
        return [
            'english_name' => fake()->name(),
            'second_name' => fake()->name(),
            'alias_name' => fake()->name(),
            'image_url' => fake()->name(),
            'contact_numbers' => fake()->text(),
            'addresses' => fake()->address(),
            'contact_emails' => fake()->companyEmail(),
            'region_id' => Region::inRandomOrder()->first('id'),
            'level_id' =>Level::inRandomOrder()->first('id'),
            'organization_type_id' => 1,
            'created_by' => User::inRandomOrder()->first('id'),
            'ip_created_by'  => Str::random(10),
        ];
    }
}
