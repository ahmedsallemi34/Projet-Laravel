<?php

namespace App\Http\Controllers;
use App\Models\User;
use Illuminate\Support\Facades\Hash;  // <-- Ajoute cette ligne

use Illuminate\Http\Request;

class UserController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $userId = session('user_id'); // Récupérer l'ID de l'utilisateur dans la session

        // Vérifier si l'utilisateur est connecté
        if ($userId) {
            // L'utilisateur est connecté, tu peux l'utiliser dans ta logique
            $user = User::find($userId);
        } else {
            // L'utilisateur n'est pas connecté, rediriger vers la page de connexion
            return redirect()->route('login')->with('error', 'Vous devez être connecté pour accéder à cette page.');
        }
        //
        $users = \App\Models\User::all();
        return view('users.index', compact('users'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('users.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $request->validate([
            'name' => 'required|string|max:255',
            'email' => 'required|email|unique:users,email',
            'password' => 'required|string|min:8|confirmed',
        ]);

        User::create([
            'name' => $request->name,
            'email' => $request->email,
            'password' => bcrypt($request->password),
        ]);

        return redirect()->route('users.index')->with('success', 'Utilisateur ajouté avec succès.');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $user = User::findOrFail($id);
        return view('users.edit', compact('user'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
         $request->validate([
            'name' => 'required|string|max:255',
            'email' => 'required|email|unique:users,email,' . $id,
            'password' => 'nullable|string|min:8|confirmed',
        ]);

        $user = User::findOrFail($id);
        $user->name = $request->name;
        $user->email = $request->email;

        if ($request->filled('password')) {
            $user->password = bcrypt($request->password);
        }

        $user->save();

        return redirect()->route('users.index')->with('success', 'Utilisateur mis à jour avec succès.');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }

    public function showLoginForm()
    {
        return view('users.login');
    }

    /**
     * Vérifier les informations de connexion de l'utilisateur.
     */
    public function login(Request $request)
{
    // Validation des données
    $request->validate([
        'email' => 'required|email',
        'password' => 'required|string|min:8',
    ]);

    // Vérifier si l'utilisateur existe avec l'email
    $user = User::where('email', $request->email)->first();

    // Vérifier si l'utilisateur existe et si le mot de passe est correct
    if ($user && Hash::check($request->password, $user->password)) {
        // L'utilisateur est connecté, enregistrer son ID dans la session
        session(['user_id' => $user->id]);

        // Rediriger l'utilisateur vers la page d'accueil ou la liste des utilisateurs
        return redirect()->route('gestionnaire.dashboard')->with('success', 'Connexion réussie.');
    } else {
        // Si l'utilisateur ou le mot de passe est incorrect
        return back()->withErrors([
            'email' => 'Les informations de connexion sont incorrectes.',
        ]);
    }
}

public function logout(Request $request)
{
    // Supprime toutes les données de session
    $request->session()->flush();

    // Redirige vers la page de connexion ou d'accueil
    return redirect()->route('users.login')->with('success', 'Déconnexion réussie.');
}
}
