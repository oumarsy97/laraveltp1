<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request ;

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

}
