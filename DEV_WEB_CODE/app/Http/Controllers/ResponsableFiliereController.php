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

class ResponsableFiliereController extends Controller
{
    protected function getResponsibleFiliereId($userId)
    {
        $user = User::with('filiereUsers')->find($userId);
        $filiereUser = $user->filiereUsers->first();

        if ($filiereUser) {
            return $filiereUser->id_filiere;
        }

        return null;
    }

    public function addAnnouncement(Request $request)
    {
        $request->validate([
            'message' => 'required',
            'type' => 'required',
        ]);

        $responsibleFiliereId = $this->getResponsibleFiliereId(auth()->user()->id_utilisateur);

        if (!$responsibleFiliereId) {
            return redirect('/dashboard')->with('error', 'You are not associated with any filiere.');
        }

        Annonce::create([
            'ID_filiere' => $responsibleFiliereId,
            'ID_utilisateur' => auth()->user()->id_utilisateur,
            'Type_annonce' => $request->input('type'),
            'Contenu' => $request->input('message'),
        'titre' => $request->input('titre'),

        ]);

        return redirect('/dashboard')->with('success', 'Announcement added successfully');
    }
}
