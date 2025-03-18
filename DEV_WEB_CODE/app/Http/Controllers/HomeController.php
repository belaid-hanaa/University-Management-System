<?php

// HomeController.php

namespace App\Http\Controllers;

use App\Models\Annonce;
use Illuminate\Http\Request;

class HomeController extends Controller
{
    public function index()
    {
        $homePageAnnouncements = Annonce::where('Type_annonce', 'Homepage')->limit(5)->get();
        return view('home', ['homePageAnnouncements' => $homePageAnnouncements]);
    }
        public function showFormation()
    {
        return view('formation');
    }
    public function showDepartement()
    {
        return view('departement');
    }
}
