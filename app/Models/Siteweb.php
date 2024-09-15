<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Siteweb extends Model
{
    use HasFactory;
    protected $fillable = [
        'adresse',
        'telephone',
        'email_one',
        'email_deux',
        'facebook',
        'twitter',
        'whatsapp',
        'tiktok',
        'google_maps',
    ];

}
