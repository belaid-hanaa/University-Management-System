<?php

namespace App\Http\Controllers;

use App\Models\ClassUser;
use Illuminate\Support\Facades\Log;
use Illuminate\Http\Request;
use App\Models\Classe;
use App\Models\Module;
use App\Models\User;

class ClasseController extends Controller
{
    public function afficheFormulaireclasse()
    {
        $classes = Classe::all();
        $modules = Module::all();
        $professeurs = User::all();
        // $filiere = Filiere::all();

        return view('formulaire.ajouteclasse', compact('classes', 'modules', 'professeurs'));
    }

    public function ajouteClasse(Request $request)
    {
        // Validate the form data
        $request->validate([
            'id_classe' => 'required|exists:classe,ID_classe',
            'id_module' => 'required|exists:module,id_module',
            'id_professeur' => 'required|exists:utilisateurs,id_utilisateur',
        ]);

        // Get the selected module
        $classe = Classe::find($request->input('id_classe'));

        // Check if the module is found
        if (!$classe) {
            return redirect()->back()->with('error', 'Classe non trouvé.');
        }

        // Get the id_filiere from the module
        $id_filiere = $classe->id_filiere;

        // Check if the entry already exists
        if (ClassUser::where([
            'id_module' => $request->input('id_module'),
            'id_utilisateur' => $request->input('id_professeur'),
            'ID_classe' => $request->input('id_classe'),
            'id_filiere' => $id_filiere,
        ])->exists()) {
            // Entry already exists, handle accordingly (e.g., show an error message)
            return redirect()->back()->with('error', 'La combinaison existe déjà dans la table.');
        }

        // Create a new ClassUser instance
        $classuser = ClassUser::firstOrCreate(
            [
                'id_module' => $request->input('id_module'),
                'id_utilisateur' => $request->input('id_professeur'),
                'ID_classe' => $request->input('id_classe'),
                'id_filiere' => $id_filiere,
            ]);

        // Save the new ClassUser record
        $classuser->save();

        // Log a message
        Log::info('New record added to classusers table.');

        // Return a response or redirect
        return redirect('/dashboard')->with('success', 'Responsable du département modifié avec succès.');
    }

}