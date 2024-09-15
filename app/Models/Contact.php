<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Contact extends Model
{
    use HasFactory;
    protected $fillable = [
        'first_name', 'email', 'phone', 'message'
    ];

    // Utilisez la propriété $dates pour activer les attributs en tant que dates
    protected $dates = ['deleted_at'];

}
