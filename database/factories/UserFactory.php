<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Str;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\User>
 */
class UserFactory extends Factory
{
    /**
     * The current password being used by the factory.
     */
    protected static ?string $password;

    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        static $index = 0;

        $gender = ($index % 2) != 0 ? 'F' : 'M';

        $year = date('Y');
        $birthdate = (($year - 25) + $index) . '1010';

        $index++;

        return [
            'username' => 'Sample' . $index,
            'firstname' => fake()->name(),
            'middlename' => fake()->name(),
            'lastname' => fake()->name(),
            'handle' => '@sample' . $index,
            'email' => 'sample' . $index . '@example.com',
            'password_hash' => Hash::make('sample' . $index),
            'birthdate' => $birthdate,
            'gender' => $gender,
            'country' => 'Philippines',
            'type' => 'test',
            'description' => 'Test Account ' . $index . '. For testing purposes only.',
        ];
    }

    /**
     * Indicate that the model's email address should be unverified.
     */
    public function unverified(): static
    {
        return $this->state(fn (array $attributes) => [
            'email_verified_at' => null,
        ]);
    }
}
