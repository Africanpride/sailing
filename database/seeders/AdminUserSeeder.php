<?php

namespace Database\Seeders;

use App\Models\User;
use Illuminate\Support\Str;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;

class AdminUserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {

        $super_admin = User::factory()->create([
            'firstName' => 'Pius',
            'lastName' => 'Opoku-Fofie',
            'email' => 'webmaster@costrad.org',
            'email_verified_at' => now(),
            'password' => Hash::make('123Ghana'),
            'remember_token' => Str::random(10),
            'staff' => true,
            'ban' => false
        ]);
        // $super_admin->profile()->update([
        //     'bio' => 'Update Admin bio',
        //     'lc_country_id' => 80,
        // ]);

        $super_admin->assignRole('super_admin');
        $this->command->info("Admin User Creation Done");
    }
}
