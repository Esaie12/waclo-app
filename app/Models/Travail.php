<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Travail extends Model
{
    use HasFactory;

    protected $fillable = [
        'your_name', 'sexe', 'email', 'telephone', 'age', 'adresse', 'others',
        'date_demande', 'date_traitement', 'traiter', 'traiter_by', 'date_rdv', 'reject_dossier'
    ];

}
