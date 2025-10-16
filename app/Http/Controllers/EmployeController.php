<?php

namespace App\Http\Controllers;

use App\Models\employes;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;

class EmployeController extends Controller
{
    public function index()
    {

        $employes = employes::paginate(5);
        return view('employers.employer', compact('employes'));
    }

    public function importcsv(Request $request)
    {
        // verifier les donnees 
        $validator = Validator::make($request->all(), [
            'file' => 'required|mimes:csv,txt|max:2048',
        ]);

        if ($validator->fails()) {
            return redirect()->back()->with('error_msg', 'Veuillez sélectionner un fichier CSV valide.');
        }

        $file = $request->file('file'); // recupere le fichier
        $handle = fopen($file, 'r'); // ouvre le fichier en mode lecture

        // Lire la première ligne et retirer le BOM si présent
        $firstLine = fgets($handle);
        $firstLine = preg_replace('/\x{FEFF}/u', '', $firstLine); // supprime le BOM
        $headers = str_getcsv($firstLine, ';'); // Séparateur ;


        $imported = 0;
        while (($data = fgetcsv($handle, 1000, ';')) !== false) {


            $count = count($data);
            if ($count != 8) {
                continue; // Ignorer les lignes avec un nombre incorrect de colonnes
            }

            // ✅ Définir la fonction de conversion (closure)
            $formatDate = function ($date) {
                $date = trim($date);
                if (empty($date)) return null;

                // Si la date contient des "/" → format français
                if (strpos($date, '/') !== false) {
                    $parts = explode('/', $date);    // explode coupe un chaine de caractere en morceaux et retourne un tableau
                    if (count($parts) === 3) {
                        return $parts[2] . '-' . $parts[1] . '-' . $parts[0]; // yyyy-mm-dd
                    }
                }

                return $date; // déjà au bon format
            };


            employes::updateOrCreate(
                ['matricule' => trim($data[0])],
                [
                    'nom' => trim($data[1]),
                    'prenom' => trim($data[2]),
                    'poste' => trim($data[3]),
                    'departement' => trim($data[4]),
                    'date_recrutement' => $formatDate($data[5]),
                    'date_dernier_echelon' => $formatDate($data[6]),
                    'echelon' => trim($data[7]),
                ]
            );

            $imported++;
        }

        fclose($handle);

        return redirect()->back()->with('success_msg', "$imported employés importés avec succès !");
    }
}
