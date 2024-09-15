<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

use App\Models\Employe;
use Illuminate\Database\Eloquent\Factories\Factory;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Str;

class EmployeSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $employes = [
            [
                'name' => 'Employe1',
                'email' => 'emp@gmail.com',
                'password' => Hash::make('P@ssW0rd'),
                'telephone' => '0123456789',
                'adresse' => '123 Rue Exemple',
                'birthday' => '1990-01-01',
                'sexe' => 'M',
                'photo' => null,
                'date_fonction' => '2022-01-01',
                'date_fin_contrat' => '2023-01-01',
                'contrat' => 'CDI',
                'actif' => 1,
                'creer_par' => 1,
                'date_create' => '2022-01-01',
                'date_depart' => null,
                'salaire' => 3000,
            ],
            [
                'name' => 'Employe2',
                'email' => 'emp2@gmail.com',
                'password' => Hash::make('P@ssW0rd'),
                'telephone' => '0987654321',
                'adresse' => '456 Rue Exemple',
                'birthday' => '1992-02-02',
                'sexe' => 'F',
                'photo' => null,
                'date_fonction' => '2022-02-01',
                'date_fin_contrat' => '2023-02-01',
                'contrat' => 'CDD',
                'actif' => 1,
                'creer_par' => 1,
                'date_create' => '2022-02-01',
                'date_depart' => null,
                'salaire' => 2500,
            ]
        ];

        foreach ($employes as $employe) {
            Employe::create($employe);
        }

        Employe::factory()->count(20)->create();
    }
}
