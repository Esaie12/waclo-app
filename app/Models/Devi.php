<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Devi extends Model
{
    use HasFactory;

    protected $fillable = [
        'espace', 'frequence', 'surface', 'activite_society', 'demarrage',
        'collabo_society', 'your_name', 'email', 'telephone', 'name_society',
        'others', 'services', 'fichier', 'date_emission', 'date_traitement',
        'traiter', 'traiter_by', 'fichier_send'
    ];

    protected $casts = [
        'services' => 'array', // Pour stocker et récupérer les services en tant que tableau
        'date_emission' => 'date',
        'date_traitement' => 'date',
        'traiter' => 'boolean'
    ];

}
