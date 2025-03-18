<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;
use App\Models\Departement;
use App\Models\DepartementUser;

class ResponsableDepartementController extends Controller
{
    public function afficherFormulaire()
    {
        // Récupérer la liste des départements
        $departements = Departement::all();

        // Récupérer la liste des professeurs
        $professeurs = User::all();

        return view('formulaire.modifierResponsable', compact('departements', 'professeurs'));
    }

    public function modifierResponsable(Request $request)
    {
        $request->validate([
            'departement_id' => 'required|exists:departement,ID_departement',
            'nouveau_responsable' => 'required|exists:utilisateurs,id_utilisateur',
        ]);
    
        try {
            // Récupérer l'ancien responsable du département
            $ancienResponsable = Departement::findOrFail($request->input('departement_id'))->id_utilisateur;
    
            // Mettre à jour l'ancien responsable du département en tant que professeur
            User::where('id_utilisateur', $ancienResponsable)->update(['role' => 'professeur']);
    
            // Mettre à jour le nouveau responsable du département en tant que chef de département
            User::where('id_utilisateur', $request->input('nouveau_responsable'))->update(['role' => 'chef_departement']);
    
            // Mettre à jour la référence de l'utilisateur responsable dans la table departement
            Departement::where('ID_departement', $request->input('departement_id'))
                ->update(['id_utilisateur' => $request->input('nouveau_responsable')]);
    
            // Créer une nouvelle entrée dans la table departementusers
            $departementUser = new DepartementUser;
            $departementUser->id_departement = $request->input('departement_id');
            $departementUser->id_utilisateur = $request->input('nouveau_responsable');
            if (!DepartementUser::where([
                'id_departement' => $departementUser->id_departement,
                'id_utilisateur' => $departementUser->id_utilisateur,
            ])->exists()) {
                $departementUser->save();
            }
    
            return redirect('/dashboard')->with('success', 'Responsable du département modifié avec succès.');
        } catch (\Illuminate\Database\Eloquent\ModelNotFoundException $e) {
            // Gérer l'exception, par exemple, rediriger avec un message d'erreur
            return redirect('/dashboard')->with('error', 'Le département spécifié n\'existe pas.');
        }
    }
}