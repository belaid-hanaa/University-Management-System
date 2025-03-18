<?php

namespace App\Http\Controllers;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Models\support;

class AuthController extends Controller
{   
 
    public function showLoginForm()
    {
        return view('auth.login');
    }

    public function login(Request $request)
    {
        $credentials = $request->only('email', 'password');
        $authenticationAttempt = Auth::attempt($credentials);

        if ($authenticationAttempt) {
            $user = Auth::user();
            return redirect()->route('dashboard');
        } else {
            $errorMessage = 'Erreur authentication ' . json_encode($credentials);
            var_dump($errorMessage);
        
    
            return redirect('/login')->with('error', $errorMessage);
        }
    }
    public function support(Request $request)
    {
        $data=$request->validate([
            "nom" => 'required',
            "CNE" => 'required',
            "demande" => 'required'
        ]);
        $newSupport= support::create($data);
        return redirect(('/login'));

        
    }
}
