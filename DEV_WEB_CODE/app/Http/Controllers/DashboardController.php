<?php

namespace App\Http\Controllers;

use Illuminate\Support\Facades\Auth;
use App\Models\User;
use App\Models\Annonce;
use App\Models\Module;
use App\Models\ModuleUser;
use App\Models\Departement;
use App\Models\DepartementUser;
use App\Models\Filiere;
use App\Models\FiliereUser;
use App\Models\Demande;
use App\Models\Salle;
use App\Models\Emploi;



use Illuminate\Http\Request;

class DashboardController extends Controller
{

    public function updateDemandeStatus(Request $request, Demande $demande)
    {
        $request->validate([
            'status' => 'required|in:non_vue,en_cours,traite',
        ]);

        $demande->update([
            'status' => $request->input('status'),
        ]);

        return redirect()->back()->with('success', 'Status updated successfully');
    }
    public function dashboard()
    {
        $user = Auth::user();
    
        switch ($user->role) {
            case 'etudiant':
                #Affichage annonces
                $user = auth()->user();
                $modules = $user->modules;
                $filieres = $user->filieres;
                $announcements = Annonce::whereIn('ID_module', $user->modules->pluck('id_module'))
                ->orWhereIn('ID_filiere', $user->filieres->pluck('id_filiere'))
                ->orWhereIn('ID_departement', $user->filieres->pluck('id_departement'))
                ->where('Type_annonce', 'StudentDashboard')
                ->limit(5)
                ->get();               

                #Affichage emploi
                $reservations = Emploi::whereIn('ID_module', $modules->pluck('id_module'))->get();

                return view('dashboards.etudiant', ['modules' => $modules, 'filieres' => $filieres, 'announcements' => $announcements, 'reservations'=>$reservations]);

            case 'delegue':
                #Affichage annonces
                $user = auth()->user();
                $modules = $user->modules;
                $filieres = $user->filieres;
                $announcements = Annonce::whereIn('ID_module', $user->modules->pluck('id_module'))
                ->orWhereIn('ID_filiere', $user->filieres->pluck('id_filiere'))
                ->orWhereIn('ID_departement', $user->filieres->pluck('id_departement'))
                ->where('Type_annonce', 'StudentDashboard')
                ->limit(5)
                ->get();  
                
                #Affichage emploi
                $reservations = Emploi::whereIn('ID_module', $modules->pluck('id_module'))->get();
                return view('dashboards.delegue', ['modules' => $modules, 'filieres' => $filieres, 'announcements' => $announcements, 'reservations'=>$reservations]);

            case 'professeur':
                #Affichage demandes
                $user = auth()->user();
                $modules = $user->modules;
                $filieres = $user->filieres;
                $professorDemandes = Demande::whereIn('id_module', $modules->pluck('id_module'))
                ->where('type', 'professeur')
                ->whereIn('status', ['non_vue', 'en_cours'])
                ->limit(5)
                ->get();

                #Affichage emploi
                $reservations = Emploi::whereIn('ID_module', $modules->pluck('id_module'))->get();
                return view('dashboards.professeur', ['modules' => $modules, 'filieres' => $filieres, 'demandes' => $professorDemandes, 'reservations'=>$reservations]);

            case 'responsable_filiere':
                #Affichage demandes
                $user = auth()->user();
                $filieres = $user->filieres;
                $respo_filiereDemandes = Demande::whereIn('id_filiere', $filieres->pluck('id_filiere'))
                ->whereIn('status', ['non_vue', 'en_cours'])               
                ->where('type', 'responsable_filiere')
                ->orWhere(function ($query) use ($filieres) {
                    $query->where('type', 'delegue')
                          ->whereIn('id_filiere', $filieres->pluck('id_filiere'))
                          ->whereIn('status', ['non_vue', 'en_cours']) ;
                }) 
                ->limit(5)
                ->get();

                return view('dashboards.responsable_filiere', ['filieres' => $filieres, 'demandes' => $respo_filiereDemandes]);

            case 'chef_departement':
                #reservartion emploi salles avec meme departement
                $user = auth()->user();
                $departements = $user->departements;
                $departementId = $departements->pluck('ID_departement')->toArray();

                $salles = Salle::where('ID_departement', $departementId)->get();
                $professeurs = User::where('role', 'professeur')
                ->whereHas('departementUsers', function ($query) use ($departementId) {
                    $query->whereIn('id_departement', $departementId);
                })
                ->get();
            
                $modules = Module::whereHas('filiere', function ($query) use ($departementId) {
                    $query->whereIn('id_departement', $departementId);
                })
                ->get();            
                $reservations = Emploi::where(function ($query) use ($departementId) {
                    $query->whereNull('ID_departement')->orWhere('ID_departement', $departementId);
                })->get();
            
                return view('dashboards.chef_departement',['salles' => $salles,'professeurs' => $professeurs,'modules' => $modules,'reservations' => $reservations, 'departements' => $departements]);

            case 'responsable_pedagogique':
                #Reservation emploi salles sans departement
                $salles = Salle::whereNull('ID_departement')->get();
                $professeurs = User::where('role', 'professeur')->get();
                $modules = Module::all();
                $reservations = Emploi::whereHas('salle', function ($query) {
                    $query->whereNull('ID_departement');
                })->get();
                #Bach ndahro les filieres w les modules mn database
                $filieres = Filiere::with('modules')->get();

                return view('dashboards.responsable_pedagogique', ['salles' => $salles,'professeurs' => $professeurs,'modules' => $modules,'reservations' => $reservations, 'filieres' => $filieres]);

            default:
                return redirect('/');
        }
    }
}
