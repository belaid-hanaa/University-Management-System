<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Filiere;
use App\Models\Module;
use App\Models\Departement;
use App\Models\User;


class AjouteFiliereController extends Controller
{
    public function afficheFormulaireajoute()
    { 
        // Récupérer la liste des départements
        $departements = Departement::all();

        // Récupérer la liste des professeurs
        $professeurs = User::whereIn('role', ['professeur', 'responsable_filiere'])->get();

        return view('formulaire.ajoutefilier', compact('departements', 'professeurs'));
       
    }

    // Method to handle form submission
    // Method to handle form submission
    public function ajouteFiliere(Request $request)
    {
        // Validate the form data
        $validatedData = $request->validate([
            'nouveau_nom' => 'required|string|max:255',
            'nouvelle_description' => 'required|string',
            'departement_id' => 'required|exists:departement,ID_departement',
            'nouveau_responsable' => 'required|exists:utilisateurs,id_utilisateur',

            // Validation rules for module 1
            'nouveau_nom1' => 'required|string|max:255',
            'nouvelle_description1' => 'required|string',

            // Validation rules for module 2
            'nouveau_nom2' => 'required|string|max:255',
            'nouvelle_description2' => 'required|string',
        ]);

        // Create a new filière
        $filiere = new Filiere;
        $filiere->nom = $validatedData['nouveau_nom'];
        $filiere->description = $validatedData['nouvelle_description'];
        $filiere->id_departement = $validatedData['departement_id'];
        $filiere->id_utilisateur = $validatedData['nouveau_responsable'];
        $filiere->save();

        // Associate module 1 with the new filière
        $module1 = new Module;
        $module1->nom = $request->input('nouveau_nom1');
        $module1->description = $request->input('nouvelle_description1');
        $module1->filiere()->associate($filiere); // Associate module with the new filière
        $module1->save();

        // Associate module 2 with the new filière
        $module2 = new Module;
        $module2->nom = $request->input('nouveau_nom2');
        $module2->description = $request->input('nouvelle_description2');
        $module2->filiere()->associate($filiere); // Associate module with the new filière
        $module2->save();

        // Optionally, you can redirect the user to a specific page after successful submission
        return redirect('/dashboard')->with('success', 'ajoute filiere avec succès.');
    }

}