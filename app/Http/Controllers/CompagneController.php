<?php

namespace App\Http\Controllers;

use App\Http\Requests\CompagneRequest;
use App\Models\Compagnes;
use App\Models\employes;
use Carbon\Carbon;
use Illuminate\Http\Request;

class CompagneController extends Controller
{
    public function index()
    {
        $compagnes = Compagnes::paginate(7);
        return view('compagnes.index', compact('compagnes'));
    }

    public function store( Compagnes $compagnes,Request $request){
        try {
             $compagnes->titre_compagne = $request->titre_compagne;
             $compagnes->type = $request->type;
             $compagnes->date_debut = $request->date_debut;
             $compagnes->date_fin = $request->date_fin;
             $compagnes->description = $request->description;
             
             $today = Carbon::today();
             if ($compagnes->date_fin < $today) {
                 $compagnes->status = 'Clôturée';
             } elseif ($compagnes->date_debut < $today) {
                 $compagnes->status = 'En cours';
             } else {
                 $compagnes->status = 'Planifiée';
             }

             $compagnes->save();

            return redirect()->route('compagnes.index')->with('success_msg', 'Campagne créée avec succès.');
        } catch (\Exception $e) {
            return redirect()->route('compagnes.index')->with('error_msg', 'Une erreur est survenue lors de la création de la campagne.');
        }
    }

    public function showEmployes($id){

        $compagne = Compagnes::findOrFail($id);
        $mois = Carbon::parse($compagne->date_debut)->month;
        $employes = employes::whereMonth('date_recrutement', $mois)
            ->paginate(7);
        $moisNom = ucfirst(Carbon::parse($compagne->date_debut)->translatedFormat('F'));

        return view('compagnes.employes_compagne', compact('compagne','employes','moisNom'));
    }
}
