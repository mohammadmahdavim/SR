<?php

namespace Database\Factories;

use App\Models\Level;
use App\Models\Organization;
use App\Models\OrganizationType;
use App\Models\Region;
use App\Models\User;
use Illuminate\Database\Eloquent\Factories\Factory;
use Illuminate\Support\Str;
use Ramsey\Uuid\Type\Integer;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Contract>
 */
class ContractFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition()
    {
        return [
            'director_first_name' => fake()->name(),
            'director_last_name' => fake()->name(),
            'more_director' => fake()->name(),
            'economic_id' => fake()->numerify('##########'),
            'vat_number' => fake()->numerify('##########'),
            'national_id' => fake()->numerify('##########'),
            'national_code' => fake()->numerify('##########'),
            'start_date' => fake()->date(),
            'end_date' => fake()->date(),
            'type' => 'original',
            'organization_id' => Organization::inRandomOrder()->first('id'),
            'created_by' => User::inRandomOrder()->first('id'),
            'ip_created_by'  => fake()->numerify('##########'),
        ];
    }
}
