<?php
namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Salle;
use App\Models\Departement;
use App\Http\Controllers\Controller;

class SalleController extends Controller
{
    public function affichersalle()
    {
        $departements = Departement::all();
        $salles = Salle::where('ID_departement', NULL)->get();

        return view('formulaire.salle', compact('departements', 'salles'));
    }
    
    public function modifiersalle(Request $request)
    {
        $request->validate([
            'salle-id' => 'required|exists:salle,ID_salle',
            'departement_id' => 'required|exists:departement,ID_departement',
        ]);

        try {
            $salle = Salle::findOrFail($request->input('salle-id'));

            // Mise à jour type de salle 

            $salle->Type = $request->input('salle-type');

            // Mise à jour du département
            $salle->ID_departement = $request->input('departement_id');

            $salle->save();

            return redirect()->route('afficher_formulaire_salle')->with('success', 'Salle modifiée avec succès.');
        } catch (\Illuminate\Database\Eloquent\ModelNotFoundException $e) {
            return redirect()->route('afficher_formulaire_salle')->with('error', 'La salle spécifiée n\'existe pas.');
        }
    }


    

}
