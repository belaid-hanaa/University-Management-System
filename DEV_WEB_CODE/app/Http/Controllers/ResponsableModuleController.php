<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;
use App\Models\Module;
use App\Models\ModuleUser;

class ResponsableModuleController extends Controller
{
    public function afficherFormulairemodule()
    {
        // Récupérer la liste des module
        $modules = Module::all();

        // Récupérer la liste des professeurs
        $professeurs = User::all();

        return view('formulaire.modifierResponsablemodule', compact('modules', 'professeurs'));
    }

    public function modifierResponsablemodule(Request $request)
    {
        // Valider les données du formulaire
        $request->validate([
            'module_id' => 'required|exists:module,id_module',
            'nouveau_responsable' => 'required|exists:utilisateurs,id_utilisateur',
        ]);

        try {
            // Récupérer l'ancien responsable du module
            $ancienResponsable = Module::findOrFail($request->input('module_id'))->id_utilisateur;

            // Mettre à jour l'ancien responsable du module en tant que professeur
            User::where('id_utilisateur', $ancienResponsable)->update(['role' => 'professeur']);

            // Mettre à jour le nouveau responsable du module en tant que chef de module
            User::where('id_utilisateur', $request->input('nouveau_responsable'))->update(['role' => 'professeur']);

            // Mettre à jour la référence de l'utilisateur responsable dans la table module
            Module::where('id_module', $request->input('module_id'))
                ->update(['id_utilisateur' => $request->input('nouveau_responsable')]);
            // Créer une nouvelle entrée dans la table ModuleUser
            
            $moduleUser = new ModuleUser;
            $moduleUser->id_module = $request->input('module_id');
            $moduleUser->id_utilisateur = $request->input('nouveau_responsable');

            if (!ModuleUser::where([
                'id_module' => $moduleUser->id_module,
                'id_utilisateur' => $moduleUser->id_utilisateur,
            ])->exists()) {
                $moduleUser->save();
            }

            return redirect('/dashboard')->with('success', 'Responsable du module modifié avec succès.');
        } catch (\Illuminate\Database\Eloquent\ModelNotFoundException $e) {
            // Gérer l'exception, par exemple, rediriger avec un message d'erreur
            return redirect('/dashboard')->with('error', 'Le module spécifié n\'existe pas.');
        }
    }
}