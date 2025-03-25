<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;
use Illuminate\Support\Facades\Hash;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\User>
 */
class UserFactory extends Factory
{
    // Optional: You can keep a static password if you want to avoid rehashing.
    protected static ?string $hashedPassword = null;

    public function definition(): array
    {
        return [
            'name' => $this->faker->name(),
            'phone' => $this->faker->unique()->phoneNumber(),
            'password' => static::$hashedPassword ??= Hash::make('password'),
            'role' => $this->faker->randomElement(['admin', 'farmer']),
        ];
    }
}
