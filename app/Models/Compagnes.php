<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Compagnes extends Model
{
    protected $fillable = [
        'titre_compagne',
        'type',
        'date_debut',
        'date_fin',
        'description',
        'status',
    ];
}
