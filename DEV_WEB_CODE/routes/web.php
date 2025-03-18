<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AuthController;
use App\Http\Controllers\DashboardController;
use App\Http\Controllers\ProfileController;
use App\Http\Controllers\EmploiController;
use App\Http\Controllers\ProfessorController;
use App\Http\Controllers\ResponsableFiliereController;
use App\Http\Controllers\ChefDepartementController;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\StudentController;
use App\Http\Controllers\ResponsablePedagogiqueController;

use App\Http\Controllers\ResponsableDepartementController;
use App\Http\Controllers\ResponsableFilierController;
use App\Http\Controllers\ResponsableModuleController;
use App\Http\Controllers\FiliereController;
use App\Http\Controllers\AjouteFiliereController;
use App\Http\Controllers\SalleController;
use App\Http\Controllers\ClasseController;








/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

#Hadi dial l home 
Route::get('/', [HomeController::class, 'index'])->name('home');

#Hado dial login
Route::get('/login', [AuthController::class, 'showLoginForm'])->name('login');
Route::post('/login', [AuthController::class, 'login']);

#Hado dial dashboards
Route::group(['middleware' => 'auth'], function () {
    Route::get('/dashboard', [DashboardController::class, 'dashboard'])->name('dashboard');
});

#Hado dial profiles
Route::get('/profile', [ProfileController::class, 'showProfile']);

#Hado dial emploi
Route::get('/emploi', [EmploiController::class, 'showEmploi']);

#Hadi bach prof ydir annonce n les etudiants dialo
Route::post('/professor/add-announcement', [ProfessorController::class, 'addAnnouncement'])->name('professor.addAnnouncement');

#Hadi bach responsable filiere ydir annonce n les etudiant li fdak lfiliere
Route::post('/responsible-filiere/add-announcement', [ResponsableFiliereController::class, 'addAnnouncement'])->name('responsible-filiere.addAnnouncement');

#hadi n chef departement bach yzid annonce, either n students wla n home page
Route::post('/chef-departement/add-announcement', [ChefDepartementController::class, 'addAnnouncement'])->name('chef-departement.addAnnouncement');

#hadi n etudiant bach ydir demande
Route::post('/etudiant/add-demande', [StudentController::class, 'addDemande'])->name('etudiant.addDemande');

#hadi bach professeur/repo y updati demande
Route::put('/update-demande-status/{demande}', [DashboardController::class, 'updateDemandeStatus'])->name('update-demande-status');

#Hadi bach respo pedagogique ydir alter f emploi
Route::post('/responsable-pedagogique/make-reservation', [ResponsablePedagogiqueController::class, 'makeReservation'])->name('responsable-pedagogique.make-reservation');

#Hadi bach chef departement ydir reservations f emploi dial les salles dialo
Route::post('/chef-departement/make-reservation', [ChefDepartementController::class, 'makeReservation'])->name('chef-departement.make-reservation');

# Ajouter la route pour afficher le formulaire de modification -Amina/Hanaa
Route::get('/afficher-formulaire', [ResponsableDepartementController::class, 'afficherFormulaire'])->name('afficher_formulaire');
# Ajouter la route pour traiter le formulaire de modification Amina/Hanaa
Route::post('/modifier-responsable', [ResponsableDepartementController::class, 'modifierResponsable'])->name('modifier_responsable');
// Route pour afficher le formulaire
Route::get('/afficher-formulaire-filiere', [ResponsableFilierController::class, 'afficherFormulairefiliere'])->name('afficher_formulaire_filiere');

// Route pour traiter la modification du responsable de la filière
Route::post('/modifier-responsable-filiere', [ResponsableFilierController::class, 'modifierResponsablefiliere'])->name('modifier_responsable_filiere');
//...

// Route pour afficher le formulaire du module
Route::get('/afficher-formulaire-module', [ResponsableModuleController::class, 'afficherFormulairemodule'])->name('afficher_formulaire_module');

// Route pour traiter la modification du responsable du module
Route::post('/modifier-responsable-module', [ResponsableModuleController::class, 'modifierResponsablemodule'])->name('modifier_responsable_module');
// Afficher le formulaire
Route::get('/afficher-formulaire-modification', [FiliereController::class, 'afficherFormulairemodification'])->name('afficher_formulaire_modification');


// Modifier la filière et les modules
Route::post('/modifierFiliere', [FiliereController::class, 'modifierFiliere'])->name('modifier_filiere_modules');

Route::get('/affiche_formulaire_ajoute', [AjouteFiliereController::class, 'afficheFormulaireajoute'])->name('affiche_formulaire_ajoute');

// Handle form submission
Route::post('/ajoute_filiere', [AjouteFiliereController::class, 'ajouteFiliere'])->name('ajoute_filiere');

Route::get('/afficher-formulaire-salle', [SalleController::class, 'affichersalle'])->name('afficher_formulaire_salle');
Route::post('/modifier-responsable-salle', [SalleController::class, 'modifiersalle'])->name('modifier_salle');


// Route to display the form
Route::get('/affiche-formulaire-classe', [ClasseController::class, 'afficheFormulaireClasse'])->name('affiche_formulaire_classe');

// Route to handle the form submission
Route::post('/ajoute-classe', [ClasseController::class, 'ajouteClasse'])->name('ajoute_classe');



#support -Firdaous
Route::post('/authen/support', [AuthController::class, 'support'])->name('authen.support');

#formation -Firdaous
Route::get('/formation', [HomeController::class, 'showFormation'])->name('formation');

#departement -Firdaous
Route::get('/departement', [HomeController::class, 'showDepartement'])->name('departement');