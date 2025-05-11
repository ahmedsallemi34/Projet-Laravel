@extends('layouts.app')

@section('title', 'Tableau de bord Gestionnaire')

@section('content')
<div class="container py-4">
    <h1 class="mb-4 text-center text-light"><i class="bi bi-speedometer2 me-2"></i> Tableau de bord du gestionnaire</h1>

    <div class="row row-cols-1 row-cols-md-3 g-4 mb-4">
        <div class="col">
            <div class="card dashboard-card h-100">
                <div class="card-body text-center">
                    <h5 class="card-title text-light"><i class="bi bi-carrot-fill me-2"></i> Ingrédients</h5>
                    <p class="card-text text-light-50">{{ $ingredientCount }} ingrédient(s) enregistré(s)</p>
                    <a href="{{ route('ingredients.index') }}" class="btn btn-outline-light btn-sm dashboard-button"><i class="bi bi-list-ul me-1"></i> Gérer les ingrédients</a>
                </div>
            </div>
        </div>

        <div class="col">
            <div class="card dashboard-card h-100">
                <div class="card-body text-center">
                    <h5 class="card-title text-light"><i class="bi bi-receipt-fill me-2"></i> Recettes</h5>
                    <p class="card-text text-light-50">{{ $recetteCount }} recette(s) disponible(s)</p>
                    <a href="{{ route('recettes.index') }}" class="btn btn-outline-light btn-sm dashboard-button"><i class="bi bi-list-ul me-1"></i> Gérer les recettes</a>
                </div>
            </div>
        </div>

        <div class="col">
            <div class="card dashboard-card h-100">
                <div class="card-body text-center">
                    <h5 class="card-title text-light"><i class="bi bi-calendar-check-fill me-2"></i> Plans Alimentaires</h5>
                    <p class="card-text text-light-50">{{ $planCount }} plan(s) créé(s)</p>
                    <a href="{{ route('plans.index') }}" class="btn btn-outline-light btn-sm dashboard-button"><i class="bi bi-list-ul me-1"></i> Voir les plans</a>
                </div>
            </div>
        </div>
    </div>

    @if (session('user_id')===1)
        <div class="dashboard-actions p-3 rounded shadow">
            <h3 class="mt-0 mb-3 text-light"><i class="bi bi-lightning-fill me-2"></i> Actions rapides</h3>
            <ul class="list-unstyled">
                <li class="mb-2"><i class="bi bi-plus-circle-fill text-success me-2"></i> <a href="{{ route('ingredients.create') }}" class="text-light">Ajouter un nouvel ingrédient</a></li>
                <li class="mb-2"><i class="bi bi-plus-circle-fill text-success me-2"></i> <a href="{{ route('recettes.create') }}" class="text-light">Créer une nouvelle recette</a></li>
                <li class="mb-2"><i class="bi bi-plus-circle-fill text-success me-2"></i> <a href="{{ route('plans.create') }}" class="text-light">Créer un nouveau plan alimentaire</a></li>
            </ul>
        </div>
    @endif
</div>

<style>
    body {
        background-color: #4a5568; /* Gris-bleu foncé */
        font-family: 'Segoe UI', sans-serif;
        color: #f7fafc; /* Couleur de texte par défaut pour la page */
    }

    .dashboard-card {
        background-color: #4a5568; /* Gris-bleu foncé */
        border-radius: 10px;
        box-shadow: 0 4px 6px rgba(0, 0, 0, 0.1);
    }

    .dashboard-actions {
        background-color: #4a5568; /* Gris-bleu foncé */
    }

    .text-light {
        color: #f7fafc !important; /* Blanc cassé */
    }

    .text-light-50 {
        color: rgba(247, 250, 252, 0.7) !important; /* Blanc cassé avec opacité */
    }

    .dashboard-button {
        background-color: transparent;
        border-color: #f7fafc;
        color: #f7fafc;
        transition: background-color 0.3s ease, border-color 0.3s ease;
    }

    .dashboard-button:hover {
        background-color: #374151; /* Légèrement plus foncé au survol */
        border-color: #f7fafc;
    }

    .dashboard-actions a {
        color: #f7fafc;
        text-decoration: none;
        transition: color 0.3s ease;
    }

    .dashboard-actions a:hover {
        color: #d2d6dc;
    }
</style>
@endsection