<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\Siteweb;

class SiteSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        Siteweb::create(
            [
                'adresse' => '123 Rue Exemple',
                'telephone' => '0123456789',
                'email_one' => 'contact1@example.com',
                'email_deux' => 'contact2@example.com',
                'facebook' => 'https://facebook.com/site1',
                'twitter' => 'https://twitter.com/site1',
                'whatsapp' => '1234567890',
                'tiktok' => 'https://tiktok.com/@site1',
                'google_maps' => 'https://maps.google.com/?q=site1',
            ],
        );
    }
}
