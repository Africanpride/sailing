<?php

namespace Database\Factories;

use App\Models\Institute;
use Illuminate\Support\Str;
use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Edition>
 */
class EditionFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        return [
            'institute_id' => Institute::pluck('id')->random(),
            'title' => fake()->sentence(),
            'slug' => Str::slug(fake()->sentence()),
            'theme' => 'Edition ' . rand(1, 100),
            'acronym' => "ABC",
            'overview' => fake()->paragraph(),
            'about' => fake()->text(),
            'introduction' => fake()->paragraph(),
            'banner' => fake()->imageUrl(),
            'startDate' => now()->addDays(7),
            'endDate' => now()->addDays(14),
            'seo' => fake()->text(),
            'active' => rand(0, 1),
            'price' => fake()->randomFloat(2, 100, 1000),
        ];
    }
}
