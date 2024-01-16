<?php

namespace Database\Seeders;

use App\Models\Edition;
use Illuminate\Database\Seeder;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;

class EditionSeeder extends Seeder
{
    protected $model = Edition::class;
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        Edition::factory()->count(9)->create();
    }
}
