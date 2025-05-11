<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;

use App\Models\Recette;
use App\Models\Ingredient;

class RecetteController extends Controller
{
// Affiche la liste des recettes
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


        $recettes = Recette::with('ingredients')->get();
        return view('recettes.index', compact('recettes'));
    }

    // Formulaire pour ajouter une nouvelle recette
    public function create()
    {
        $ingredients = Ingredient::all();
        return view('recettes.create', compact('ingredients'));
    }

    // Enregistre une nouvelle recette dans la base de données
    public function store(Request $request)
    {
        // Validation des données envoyées
        $data = $request->validate([
            'titre'         => 'required|string|max:255',
            'description'   => 'required|string',
            'ingredients'   => 'required|array|min:1',
            // on gère manuellement la création d'ingrédients non existants
        ]);

        // Création de la recette
        $recette = Recette::create([
            'titre'       => $data['titre'],
            'description' => $data['description'],
        ]);

        // Préparer les IDs d'ingrédients (existants ou nouveaux)
        $syncIds = [];
        foreach ($data['ingredients'] as $item) {
            if (is_numeric($item) && Ingredient::where('id', $item)->exists()) {
                $syncIds[] = (int) $item;
            } else {
                $new = Ingredient::create([
                    'nom'      => $item,
                    'calories' => 0,
                    'proteine' => 0,
                ]);
                $syncIds[] = $new->id;
            }
        }

        // Attacher les ingrédients à la recette
        $recette->ingredients()->sync($syncIds);

        // Redirection avec message de succès
        return redirect()
            ->route('recettes.index')
            ->with('success', 'Recette créée avec succès !');
    }

    // Formulaire pour modifier une recette existante
    public function edit($id)
    {
        $recette = Recette::with('ingredients')->findOrFail($id);
        $ingredients = Ingredient::all();
        return view('recettes.edit', compact('recette', 'ingredients'));
    }

    // Afficher une recette spécifique
    public function show($id)
    {
        $recette = Recette::with('ingredients')->findOrFail($id);
        return view('recettes.show', compact('recette'));
    }

    // Mettre à jour une recette existante
    public function update(Request $request, $id)
    {
        $data = $request->validate([
            'titre'       => 'required|string|max:255',
            'description' => 'required|string',
            'ingredients' => 'required|array|min:1',
        ]);

        $recette = Recette::findOrFail($id);
        $recette->update([
            'titre'       => $data['titre'],
            'description' => $data['description'],
        ]);

        $syncIds = [];
        foreach ($data['ingredients'] as $item) {
            if (is_numeric($item) && Ingredient::where('id', $item)->exists()) {
                $syncIds[] = (int) $item;
            } else {
                $new = Ingredient::create([
                    'nom'      => $item,
                    'calories' => 0,
                    'proteine' => 0,
                ]);
                $syncIds[] = $new->id;
            }
        }
        $recette->ingredients()->sync($syncIds);

        return redirect()
            ->route('recettes.index')
            ->with('success', 'Recette mise à jour !');
    }

    // Supprimer une recette
    public function destroy($id)
    {
        $recette = Recette::findOrFail($id);
        $recette->ingredients()->detach();
        $recette->delete();

        return back()->with('success', 'Recette supprimée !');
    }
}
