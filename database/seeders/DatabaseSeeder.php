<?php

namespace Database\Seeders;

// use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Carbon\Carbon;
use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     */
    public function run(): void
    {
        // \App\Models\User::factory(10)->create();
         \App\Models\User::factory()->create([
             'full_name' => 'Admin',
             'username' => 'admin',
             'email' => 'admin@test.com',
             'email_verified_at' => Carbon::now(),
             'password' => \Hash::make('123456'),
         ]);
    }
}
