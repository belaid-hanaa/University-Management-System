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

class ProfessorController extends Controller
{
protected function getProfessorModuleId($professorId)
{
$user = User::with('modules')->find($professorId);
$module = $user->modules->first();

if ($module) {
    return $module->id_module;
}

return null;
}
public function addAnnouncement(Request $request)
{
    $request->validate([
        'message' => 'required',
        'type' => 'required',
    ]);
    $professorId = auth()->user()->id_utilisateur;
    $moduleId = $this->getProfessorModuleId($professorId);
    Annonce::create([
        'ID_module' => $moduleId,
        'ID_utilisateur' => $professorId,
        'Type_annonce' => $request->input('type'),
        'Contenu' => $request->input('message'),
        'titre' => $request->input('titre'),
    ]);

    return redirect('/dashboard')->with('success', 'Announcement added successfully');
}
}
