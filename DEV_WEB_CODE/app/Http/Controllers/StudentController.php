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
use App\Models\Demande;

class StudentController extends Controller
{
    protected function getStudentModuleId($studentId)
    {
        $user = User::with('modules')->find($studentId);
        $module = $user->modules->first();
    
        return $module ? $module->id_module : null;
    }
    
    protected function getStudentFiliereId($studentId)
    {
        $user = User::with('filiereUsers')->find($studentId);
        $filiereUser = $user->filiereUsers->first();
    
        return $filiereUser ? $filiereUser->id_filiere : null;
    }
    
public function addDemande(Request $request)
{
    $request->validate([
        'contenu' => 'required|string',
        'type' => 'required',
    ]);

    $studentid = auth()->user()->id_utilisateur;
    $studentmoduleid = $this->getStudentModuleId($studentid);
    $studentfiliereid = $this->getStudentFiliereId($studentid);

    if (!$studentmoduleid || !$studentfiliereid) {
        return redirect('/dashboard')->with('error', 'Vous n\'avez aucune filiere ou aucun module');
    }
    Demande::create([
        'id_utilisateur' => $studentid,
        'id_module' => $studentmoduleid,
        'id_filiere' => $studentfiliereid,
        'contenu' => $request->input('contenu'),
        'status' => 'non_vue',
        'type' => $request->input('type'),
    ]);

    return redirect('/dashboard')->with('success', 'Demande faite!');
}
}
