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
        return [
            'name' => $this->faker->lastName,
            'firstname' => $this->faker->firstName,
            'name_society' => $this->faker->optional()->company,
            'email' => Str::lower($this->faker->userName).'@gmail.com',
            'type_client' => $this->faker->randomElement(['Personne Physique', 'Personne Morale']),
            'telephone' => $this->faker->optional()->phoneNumber,
            'adresse' => $this->faker->optional()->address,
            'date_sign' => $this->faker->optional()->date(),
            'last_login' => $this->faker->optional()->dateTime,
            'password' => Hash::make('P@ssw0rd'), // Mot de passe par défaut
            'remember_token' => Str::random(10),
            'email_verified_at' => $this->faker->optional()->dateTime(),
            'deleted_at' => null,
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
