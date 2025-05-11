@extends('layouts.app')

@section('title', 'Créer un Plan Alimentaire')

@section('content')
<div class="container">
    <h1>Créer un nouveau plan alimentaire</h1>

    @if ($errors->any())
        <div class="alert alert-danger">
            <ul>
                @foreach($errors->all() as $error)
                    <li>{{ $error }}</li>
                @endforeach
            </ul>
        </div>
    @endif

    <form action="{{ route('plans.store') }}" method="POST">
        @csrf

        <div class="mb-3">
            <label for="jour" class="form-label">Jour</label>
            <select name="jour" id="jour" class="form-select" required>
                <option value="">-- Choisissez un jour --</option>
                @foreach(['lundi','mardi','mercredi','jeudi','vendredi','samedi','dimanche'] as $jour)
                    <option value="{{ $jour }}">{{ ucfirst($jour) }}</option>
                @endforeach
            </select>
        </div>

        <div class="mb-3">
            <label for="repas" class="form-label">Type de repas</label>
            <select name="repas" id="repas" class="form-select" required>
                <option value="">-- Choisissez un repas --</option>
                <option value="petit-déjeuner">Petit-déjeuner</option>
                <option value="déjeuner">Déjeuner</option>
                <option value="dîner">Dîner</option>
                <option value="collation">Collation</option>
            </select>
        </div>

        <div class="mb-3">
            <label for="recette_id" class="form-label">Recette</label>
            <select name="recette_id" id="recette_id" class="form-select" required>
                <option value="">-- Sélectionnez une recette --</option>
                @foreach($recettes as $recette)
                    <option value="{{ $recette->id }}">{{ $recette->titre }}</option>
                @endforeach
            </select>
        </div>

        <button type="submit" class="btn btn-success">Créer le plan</button>
        <a href="{{ route('plans.index') }}" class="btn btn-secondary">Annuler</a>
    </form>
</div>
@endsection

