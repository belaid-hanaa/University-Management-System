<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;
use App\Models\Filiere;
use App\Models\FiliereUser;

class ResponsableFilierController extends Controller
{
    public function afficherFormulairefiliere()
    {
        // Récupérer la liste des filiere
        $filieres = Filiere::all();

        // Récupérer la liste des professeurs
        $professeurs = User::all();

        return view('formulaire.modifierResponsablefiliere', compact('filieres', 'professeurs'));
    }

    public function modifierResponsablefiliere(Request $request)
    {
        // Valider les données du formulaire
        $request->validate([
            'filiere_id' => 'required|exists:filiere,id_filiere',
            'nouveau_responsable' => 'required|exists:utilisateurs,id_utilisateur',
        ]);

        try {
            // Récupérer l'ancien responsable du filiere
            $ancienResponsable = Filiere::findOrFail($request->input('filiere_id'))->id_utilisateur;

            // Mettre à jour l'ancien responsable du filiere en tant que professeur
            User::where('id_utilisateur', $ancienResponsable)->update(['role' => 'professeur']);    

            // Mettre à jour le nouveau responsable du filiere en tant que chef de filiere
            User::where('id_utilisateur', $request->input('nouveau_responsable'))->update(['role' => 'responsable_filiere']);

            // Mettre à jour la référence de l'utilisateur responsable dans la table filiere
            Filiere::where('id_filiere', $request->input('filiere_id'))
                ->update(['id_utilisateur' => $request->input('nouveau_responsable')]);
             // Créer une nouvelle entrée dans la table FiliereUser
             $filiereUser = new FiliereUser;
             $filiereUser->id_filiere = $request->input('filiere_id');
             $filiereUser->id_utilisateur = $request->input('nouveau_responsable');
             if (!FiliereUser::where([
                'id_filiere' => $filiereUser->id_filiere,
                'id_utilisateur' => $filiereUser->id_utilisateur,
            ])->exists()) {
                $filiereUser->save();
            }

            return redirect('/dashboard')->with('success', 'Responsable du filiere modifié avec succès.');
        } catch (\Illuminate\Database\Eloquent\ModelNotFoundException $e) {
            // Gérer l'exception, par exemple, rediriger avec un message d'erreur
            return redirect('/dashboard')->with('error', 'Le filiere spécifié n\'existe pas.');
        }
    }
}