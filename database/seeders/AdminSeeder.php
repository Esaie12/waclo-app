<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\Administrateur;
use Illuminate\Support\Facades\Hash;

class AdminSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $admins = [
            [
                'role' => 1,
                'receve_mail' => 1,
                'name' => 'Admin1',
                'firstname' => 'First1',
                'email' => 'admin1@example.com',
                'password' => Hash::make('password123'),
                'telephone' => '123456789',
                'adresse' => 'Adresse 1',
            ],
            [
                'role' => 1,
                'receve_mail' => 1,
                'name' => "ADMIN",
                'firstname' => 'Edgard',
                'email' => 'admin@gmail.com',
                'password' => Hash::make('P@ssw0rd'),
                'telephone' => '987654321',
                'adresse' => 'Adresse 2',
            ],
            [
                'role' => 1,
                'receve_mail' => 1,
                'name' => "ADMIN",
                'firstname' => "Esaie",
                'email' => 'admin2@gmail.com',
                'password' => Hash::make('P@ssw0rd'),
                'telephone' => '67047668',
                'adresse' => 'Adresse 3',
            ],
        ];

        foreach ($admins as $admin) {
            Administrateur::create($admin);
        }
    }
}
