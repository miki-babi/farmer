<?php

namespace Database\Seeders;

use App\Models\User;
// use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     */
    public function run(): void
    {
        // User::factory(10)->create();

        User::factory()->create([
            'name' => 'Admin',
            'phone' => '0967072500',
            'role' => 'admin',
            'password' => bcrypt('12345678'),
        ]);
        // User::factory()->create([
        //     'name' => 'farmer1',
        //     'phone' => '0967072576',
        //     'role' => 'farmer',
        //     'password' => bcrypt('12345678'),
        // ]);
    }
}
