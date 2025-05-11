<?php

namespace App\Http\Controllers;

use App\Models\Plans;
use App\Models\Recette;
use App\Models\User;

use Illuminate\Http\Request;

class PlansController extends Controller
{
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


        $userId = auth()->id();
        $plans = Plans::with(['recette.ingredients'])
            //->where('user_id', $userId)  // Utilisation de user_id au lieu de id_utilisateur
            ->orderBy('jour')
            ->get();

        return view('plans.index', compact('plans'));
    }

    public function create()
    {
        $recettes = Recette::all();
        return view('plans.create', compact('recettes'));
    }

    public function store(Request $request)
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


        $request->validate([
            'jour' => 'required|string',
            'repas' => 'required|string',
            'recette_id' => 'required|exists:recettes,id',
        ]);

        Plans::create([
            //'user_id' => auth()->id(),  // Utilisation de user_id
            'user_id' => $userId,
            'jour' => $request->jour,
            'repas' => $request->repas,
            'recette_id' => $request->recette_id,
        ]);

        return redirect()->route('plans.index')->with('success', 'Plan alimentaire créé avec succès.');
    }

    public function show($id)
    {
        $plan = Plans::with(['recette', 'user'])->findOrFail($id); // Utilisation de Plans et 'user' pour la relation
        return view('plans.show', compact('plan'));
    }

    public function edit($id)
    {
        $plan = Plans::findOrFail($id);
        $recettes = Recette::all();
        return view('plans.edit', compact('plan', 'recettes'));
    }

    public function update(Request $request, $id)
    {
        $request->validate([
            'jour' => 'required|string',
            'repas' => 'required|string',
            'recette_id' => 'required|exists:recettes,id',
        ]);

        $plan = Plans::findOrFail($id);
        $plan->update([
            'jour' => $request->jour,
            'repas' => $request->repas,
            'recette_id' => $request->recette_id,
        ]);

        return redirect()->route('plans.index')
            ->with('success', 'Plan alimentaire mis à jour avec succès.');
    }
}
