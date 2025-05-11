<?php

namespace App\Http\Controllers;
use App\Models\User;

use App\Models\Ingredient;
use Illuminate\Http\Request;

class IngredientController extends Controller
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


        $ingredients = Ingredient::all();
        return view('ingredients.index', compact('ingredients'));
    }

    public function create()
    {
        return view('ingredients.create');
    }

    public function store(Request $request)
    {
        // ✅ Validation avec noms de champs corrects
        $request->validate([
            'nom' => 'required|string',
            'calories' => 'required|numeric',
            'proteine' => 'required|numeric', // ❗ Corrigé: éviter l'accent dans le nom de champ
        ]);

        // ✅ Crée un ingrédient avec uniquement les champs autorisés
        Ingredient::create($request->only(['nom', 'calories', 'proteine']));

        return redirect()->route('ingredients.index')->with('success', 'Ingrédient ajouté avec succès.');
    }

    public function edit($id)
    {
        $ingredient = Ingredient::findOrFail($id);
        return view('ingredients.edit', compact('ingredient'));
    }

    public function update(Request $request, $id)
    {
        $request->validate([
            'nom' => 'required|string',
            'calories' => 'required|numeric',
            'proteine' => 'required|numeric', // ❗ Corrigé: même remarque
        ]);

        $ingredient = Ingredient::findOrFail($id);
        $ingredient->update($request->only(['nom', 'calories', 'proteine']));

        return redirect()->route('ingredients.index')->with('success', 'Ingrédient mis à jour.');
    }

    public function show($id)
    {
        $ingredient = Ingredient::findOrFail($id);
        return view('ingredients.show', compact('ingredient'));
    }
}