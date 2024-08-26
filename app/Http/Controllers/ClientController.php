<?php

namespace App\Http\Controllers;

use App\Models\Client;
use App\Models\User;
use Illuminate\Http\Request;

class ClientController extends Controller
{
    //
     public function index()
    {
        $clients = Client::all();
        return view('clients.index', compact('clients'));
    }

    public function create()
    {
        return view('clients.create');
    }

    public function store(Request $request)
    {
        // Validation des données
        $request->validate([
            'nom' => 'required|string|max:255',
            'prenom' => 'required|string|max:255',
            'login' => 'required|string|max:255|unique:users',
            'password' => 'required|string|min:8|confirmed',
            'telephone' => 'required|string|max:15',
            'adresse' => 'required|string|max:255',
        ]);

        // Création de l'utilisateur
        $user = User::create([
            'nom' => $request->nom,
            'prenom' => $request->prenom,
            'login' => $request->login,
            'password' => bcrypt($request->password),
        ]);

        // Création du client associé à l'utilisateur
        Client::create([
            'user_id' => $user->id,
            'telephone' => $request->telephone,
            'adresse' => $request->adresse,
        ]);

        return redirect()->route('clients.index')->with('success', 'User and client created successfully.');
    }

    public function edit(Client $client)
    {
        return view('client.edit', compact('client'));
    }

}
