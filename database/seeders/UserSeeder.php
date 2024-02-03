<?php

namespace Database\Seeders;

use App\Models\User;
use App\Models\Profile;
use Illuminate\Database\Seeder;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;

class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        User::factory()->count(5)->has(
            Profile::factory()->state(function (array $attributes) use ( $countries) {
                return [
                    'bio' => 'Factory Bio, Update bio',
                    'lc_country_id' => $countries->random()->id,
                ];
            })
        )->create();
    }
}
