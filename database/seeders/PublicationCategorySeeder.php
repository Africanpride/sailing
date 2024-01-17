<?php

namespace Database\Seeders;

use App\Models\Category;
use Illuminate\Support\Str;
use Illuminate\Database\Seeder;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;

class PublicationCategorySeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run()
    {
        $categories = [
            'Featured',
            'Press Release',
            'Popular',
        ];

        foreach ($categories as $category) {
            Category::create([
                'title' => $category,
                'slug' => Str::slug($category),
                'overview' => 'Overview',
                'created_at' => now(),
                'updated_at' => now(),
            ]);
        }
    }
}
