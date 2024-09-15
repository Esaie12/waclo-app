<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;
use App\Models\Employe;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Str;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Employe>
 */
class EmployeFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    protected $model = Employe::class;

    public function definition()
    {
        return [
            'name' => $this->faker->name,
            'email' => Str::lower($this->faker->userName).'@gmail.com',
            'password' => Hash::make('password123'), // Mot de passe par défaut
            'telephone' => $this->faker->phoneNumber,
            'adresse' => $this->faker->address,
            'birthday' => $this->faker->date,
            'sexe' => $this->faker->randomElement(['M', 'F']),
            'photo' => null, // ou vous pouvez utiliser $this->faker->imageUrl() pour des images fictives
            'date_fonction' => $this->faker->date,
            'date_fin_contrat' => $this->faker->date,
            'contrat' => $this->faker->randomElement(['CDI', 'CDD']),
            'actif' => $this->faker->boolean(90), // 90% de chances que l'employé soit actif
            'creer_par' => 1, // ID d'un administrateur ou utilisateur qui crée
            'date_create' => $this->faker->date,
            'date_depart' => null, // ou $this->faker->optional()->date
            'salaire' => $this->faker->numberBetween(2000, 5000),
        ];
    }
}
