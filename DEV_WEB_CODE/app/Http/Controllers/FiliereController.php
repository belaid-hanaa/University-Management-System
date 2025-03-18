<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Filiere;

class FiliereController extends Controller
{
    public function afficherFormulaireModification()
    {
        // Charger les données nécessaires à afficher dans le formulaire
        $filieres = Filiere::all();
        
        return view('formulaire.modifierfilier', compact('filieres'));
    }

    public function modifierFiliere(Request $request)
    {
        // Validation des données du formulaire
        $request->validate([
            'id_filiere' => 'required|exists:filiere,id_filiere',
            'nouveau_nom' => 'required|string|max:255',
            'nouvelle_description' => 'required|string',
        ]);

        try {
            // Récupérer les données du formulaire
            $filiere = Filiere::findOrFail($request->input('id_filiere'));
    
            // Mettre à jour la filière
            $filiere->update([
                'nom' => $request->input('nouveau_nom'),
                'description' => $request->input('nouvelle_description'),
            ]);
    
            // Rediriger avec un message de succès
            return redirect('/dashboard')->with('success', 'modifier filiere avec succès.');
        } catch (\Exception $e) {
            // En cas d'autres erreurs, gérer l'exception
            return redirect()->route('formulaire.modifierfiliere')->with('error', 'Une erreur s\'est produite lors de la modification de la filière.');
        }
    }
}