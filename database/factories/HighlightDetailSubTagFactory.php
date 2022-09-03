<?php

namespace Database\Factories;

use App\Models\HighlightDetail;
use App\Models\SubTag;
use App\Models\User;
use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\HighlightDetailSubTag>
 */
class HighlightDetailSubTagFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition()
    {
        return [
            'highlight_detail_id' => HighlightDetail::inRandomOrder()->first('id'),
            'sub_tag_id' => SubTag::inRandomOrder()->first('id'),
            'created_by' => User::inRandomOrder()->first('id'),
            'ip_created_by'  => fake()->numerify('##########'),
        ];
    }
}
