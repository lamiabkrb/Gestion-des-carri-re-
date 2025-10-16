<?php

namespace App\Http\Controllers;

use App\Models\Compagnes;
use App\Models\employes;
use App\Models\Evaluation;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class ManagerController extends Controller
{
    public function index()
    {

        $compagnes = Compagnes::all();
        return view('manager.dashboard', compact('compagnes'));
    }

    public function showEmployes(Request $request)
    {
        $manager = Auth::user();
        $departement = $manager->departement;
        $compagne = Compagnes::where('status', 'En cours')->latest()->first();

        $mois = Carbon::parse($compagne->date_debut)->month;

        $query = Employes::where('departement', $departement)
            ->whereMonth('date_recrutement', $mois)
            ->with(['evaluations' => function ($q) use ($compagne, $manager) {
                $q->where('compagne_id', $compagne->id)
                    ->where('manager_id', $manager->id);
            }]);

        // 🔎 Recherche
        if ($request->filled('search')) {
            $search = $request->search;
            $query->where(function ($q) use ($search) {
                $q->where('nom', 'like', "%$search%")
                    ->orWhere('matricule', 'like', "%$search%");
            });
        }

        // 🎯 Filtrer par poste
        if ($request->filled('poste')) {
            $query->where('poste', $request->poste);
        }

        // 🧾 Filtrer par état de notation
        if ($request->etat === 'note') {
            $query->whereHas('evaluations');
        } elseif ($request->etat === 'non_note') {
            $query->whereDoesntHave('evaluations');
        }

        // 🔽 Tri
        if ($request->tri === 'nom') {
            $query->orderBy('nom');
        } elseif ($request->tri === 'note') {
            $query->withSum('evaluations', 'note')->orderBy('evaluations_sum_note', 'desc');
        } elseif ($request->tri === 'recent') {
            $query->latest();
        }

        $employes = $query->paginate(4);
        $moisNom = ucfirst(Carbon::parse($compagne->date_debut)->translatedFormat('F'));

        return view('manager.employes_anoter', compact('employes', 'moisNom', 'compagne'));
    }



    public function showPageNotation($compagne_id, $matricule)
    {
        $compagne = Compagnes::findOrFail($compagne_id);
        $employe = employes::where('matricule', $matricule)->firstOrFail();
        $evaluation = Evaluation::where('compagne_id', $compagne_id)
            ->where('employe_matricule', $matricule)
            ->where('manager_id', Auth::id())
            ->first();


        return view('manager.notation', compact('compagne', 'employe', 'evaluation'));
    }

    public function noterEmployes(Request $request, $compagne_id, $matricule)
    {
        $compagne = Compagnes::findOrFail($compagne_id);
        $employe = employes::where('matricule', $matricule)->firstOrFail();

        // Récupération des critères
        $tech = $request->input('tech', []);
        $comp = $request->input('comp', []);

        // Calculs
        $totaltech = array_sum($tech);
        $totalcomp = array_sum($comp);
        $note = $totaltech + $totalcomp;


        // Création ou mise à jour de l’évaluation existante
        Evaluation::updateOrCreate(
            [
                'employe_matricule' => $employe->matricule,
                'compagne_id' => $compagne->id,
                'manager_id' => Auth::id(),
            ],
            [
                'note' => $note,
                'commentaire' => $request->commentaire,
                'notes_details'  => [
                    'tech' => $tech,
                    'comp' => $comp,
                ],
            ]
        );


        return redirect()->route('manager.employes_anoter', $compagne->id)
            ->with('success_msg', "Évaluation enregistrée pour {$employe->nom} ({$note}/20)");
    }


    public function showCompagne(){
        $compagnes = Compagnes::paginate();
        return view('manager.mes_compagnes', compact('compagnes'));

    }
}
