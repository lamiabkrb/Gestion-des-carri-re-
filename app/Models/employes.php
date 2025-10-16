<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class employes extends Model
{
    protected $primaryKey = 'matricule';
    public $incrementing = false;
    protected $fillable = [
        'matricule',
        'nom',
        'prenom',
        'poste',
        'departement',
        'date_recrutement',
        'date_dernier_echelon',
        'echelon',
        'cpt',
    ];


    //un employé à plus d"une évaluation 
    public function evaluations(){
        return $this->hasMany(Evaluation::class,  'employe_matricule', 'matricule');
    }
}
