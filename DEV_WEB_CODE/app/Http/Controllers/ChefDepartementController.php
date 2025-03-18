<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;
use App\Models\Annonce;
use App\Models\Module;
use App\Models\ModuleUser;
use App\Models\Departement;
use App\Models\DepartementUser;
use App\Models\Filiere;
use App\Models\FiliereUser;
use App\Models\Emploi;


class ChefDepartementController extends Controller
{
    protected function getChefDepId($userId)
    {
        $user = User::with('departementUsers')->find($userId);
        $departement = $user->departementUsers->first();

        if ($departement) {
            return $departement->id_departement;
        }

        return null;
    }
    
    public function addAnnouncement(Request $request)
    {
        $request->validate([
            'message' => 'required',
            'type' => 'required',
        ]);
        $departementId = $this->getChefDepId(auth()->user()->id_utilisateur);
        
        Annonce::create([
            'ID_departement' => $departementId ,
            'ID_utilisateur' => auth()->user()->id_utilisateur,
            'Type_annonce' => $request->input('type'),
            'Contenu' => $request->input('message'),
            'titre' => $request->input('titre'),
        ]);

        return redirect('/dashboard')->with('success', 'Announcement added successfully');
    }

    public function makeReservation(Request $request)
{
    $request->validate([
        'ID_salle' => 'required',
        'ID_prof' => 'required',
        'ID_module' => 'required',
        'Crenaux' => 'required',
        'Jours' => 'required',
        'raison' => 'required',
    ]);
    $departementId = $this->getChefDepId(auth()->user()->id_utilisateur);
    Emploi::create([
        'ID_salle' => $request->input('ID_salle'),
        'ID_prof' => $request->input('ID_prof'),
        'ID_module' => $request->input('ID_module'),
        'Crenaux' => $request->input('Crenaux'),
        
        'Jours' => $request->input('Jours'),
        'raison' => $request->input('raison'),
        'ID_departement' => $departementId,
    ]);

    return redirect('/dashboard')->with('success', 'Emploi added successfully');
}

}