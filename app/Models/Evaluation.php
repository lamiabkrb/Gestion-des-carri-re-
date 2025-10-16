<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Evaluation extends Model
{
    protected $fillable = [
        'employe_matricule',
        'compagne_id',
        'manager_id',
        'note',
        'commentaire',
        'notes_details', // <- ajouter ici
    ];

    protected $casts = [
        'notes_details' => 'array', // <- caster la bonne colonne
    ];

    // une evaluation appartient à un employé
    public function employe()
    {
        return $this->belongsTo(employes::class, 'employe_matricule', 'matricule');
    }

    // Une évaluation appartient à une campagne
    public function compagne()
    {
        return $this->belongsTo(Compagnes::class);
    }

    // Une évaluation est faite par un manager (user)
    public function manager()
    {
        return $this->belongsTo(User::class);
    }
}
