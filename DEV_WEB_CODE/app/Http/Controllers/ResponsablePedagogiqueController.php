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
use App\Models\Salle;


class ResponsablePedagogiqueController extends Controller
{

    public function makeReservation(Request $request)
    {
        $request->validate([
            'ID_salle' => 'required',
            'Crenaux' => 'required',
            'Jours' => 'required',
            'raison' => 'required',
            'ID_module' => 'required',
        ]);
    
        Emploi::create([
            'ID_prof' => $request->input('ID_prof'),    
            'ID_salle' => $request->input('ID_salle'),
            'ID_module' => $request->input('ID_module'),
            'Crenaux' => $request->input('Crenaux'),
            'Jours' => $request->input('Jours'),
            'raison' => $request->input('raison'),
        ]);
    
        return redirect('/dashboard')->with('success', 'Reservation added successfully');
    }
    
}
