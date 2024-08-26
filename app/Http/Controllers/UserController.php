<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request ;
use Illuminate\Support\Facades\Auth;

class UserController extends Controller
{
    //
    public function create (){
        return view('users.create');
    }

    public function store(Request $request) {
    // Validation des données
    $request->validate([
        'nom' => 'required|string|max:255',
        'prenom' => 'required|string|max:255',
        'login' => 'required|string|max:255|unique:users',
        'password' => 'required|string|min:8|confirmed',
    ]);

    // Création de l'utilisateur
    User::create([
        'nom' => $request->nom,
        'prenom' => $request->prenom,
        'login' => $request->login,
        'password' => bcrypt($request->password),
    ]);

    return redirect()->route('users.index')->with('success', 'User created successfully.');
}

public function index() {
    $users = User::all();
    return view('users.index', compact('users'));
}


    // Afficher le formulaire de connexion
    public function showLoginForm()
    {
        return view('auth.login');
    }

    // Gérer la connexion
    public function login(Request $request)
    {
        // Validation des données
        $credentials = $request->validate([
            'login' => ['required', 'string'],
            'password' => ['required', 'string'],
        ]);

        // Tentative de connexion
        if (Auth::attempt(['login' => $credentials['login'], 'password' => $credentials['password']])) {
            // Redirection vers la page d'accueil si connexion réussie
            return redirect()->intended('/clients');
        }

        // Retourne avec une erreur si la connexion échoue
        return back()->withErrors([
            'login' => 'Les informations d’identification fournies ne correspondent pas à nos enregistrements.',
        ])->onlyInput('login');
    }

    // Gérer la déconnexion
    public function logout(Request $request)
    {
        Auth::logout();

        $request->session()->invalidate();
        $request->session()->regenerateToken();

        return redirect('/login');
    }

}
