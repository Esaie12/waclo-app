<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Contrat extends Model
{
    use HasFactory;
    protected $table = 'contrats';

    protected $fillable = [
        'id_client',
        'date_debut',
        'date_fin',
        'frequence',
        'modalite',
        'fichier_contrat',
        'date_create',
        'creer_by',
        'montant',
        'boucler',
        'view_client',
    ];

}
