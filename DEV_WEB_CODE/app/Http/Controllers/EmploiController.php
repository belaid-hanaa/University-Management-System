<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;


class EmploiController extends Controller
{
    public function showEmploi()
    {
        return view('Internal.emploi');
    }
}