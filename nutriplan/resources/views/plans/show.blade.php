@extends('layouts.app')

@section('title', 'Détails du plan alimentaire')

@section('content')
<div class="container">
    <h1>Plan alimentaire</h1>

    <div class="card mb-4">
        <div class="card-body">
            <p><strong>Jour :</strong> {{ $plan->jour }}</p>
            <p><strong>Repas :</strong> {{ $plan->repas }}</p>
            <p><strong>Utilisateur :</strong> {{ $plan->utilisateur->nom ?? 'Non spécifié' }}</p>
        </div>
    </div>

    <h4>Recette associée :</h4>
    @if ($plan->recette)
        <div class="card">
            <div class="card-body">
                <h5>{{ $plan->recette->titre }}</h5>
                <p>{{ $plan->recette->description }}</p>
                <a href="{{ route('recettes.show', $plan->recette->id) }}" class="btn btn-info">Voir la recette</a>
            </div>
        </div>
    @else
        <p>Aucune recette liée à ce plan.</p>
    @endif

    <a href="{{ route('plans.index') }}" class="btn btn-secondary mt-3">Retour aux plans</a>
</div>
@endsection
