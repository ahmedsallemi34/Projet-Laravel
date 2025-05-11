<?php

namespace App\Http\Controllers;
use App\Models\User;

use Illuminate\Http\Request;
use App\Models\Gestionnaire;
use App\Models\Recette;
use App\Models\Plans;
class GestionnaireController extends Controller
{
public function dashboard()
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
        return view('gestionnaire.dashboard', [
            'ingredientCount' => \App\Models\Ingredient::count(),
            'recetteCount' => \App\Models\Recette::count(),
            'planCount' => \App\Models\Plans::count()  // Corrige le nom ici
        ]);
    }
}
