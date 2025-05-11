@extends('layouts.app')

@section('title', 'Ajouter une Recette')

@section('content')
<div class="container">
    <h1 class="mb-4">Ajouter une nouvelle recette</h1>

    {{-- Affichage des erreurs de validation --}}
    @if ($errors->any())
        <div class="alert alert-danger">
            <ul class="mb-0">
                @foreach($errors->all() as $error)
                    <li>{{ $error }}</li>
                @endforeach
            </ul>
        </div>
    @endif

    {{-- Formulaire de création de recette --}}
    <form action="{{ route('recettes.store') }}" method="POST">
        @csrf

        <div class="mb-3">
            <label for="titre" class="form-label">Titre</label>
            <input type="text" name="titre" id="titre" class="form-control" value="{{ old('titre') }}" required>
        </div>

        <div class="mb-3">
            <label for="description" class="form-label">Description</label>
            <textarea name="description" id="description" class="form-control" rows="4" required>{{ old('description') }}</textarea>
        </div>

        <div class="mb-3">
            <label for="ingredients" class="form-label">Ingrédients</label>
            <select name="ingredients[]" id="ingredients" class="form-select" multiple required>
                @foreach ($ingredients as $ingredient)
                    <option value="{{ $ingredient->id }}">{{ $ingredient->nom }} ({{ $ingredient->calories }} kcal)</option>
                @endforeach
            </select>
        </div>

        <button type="submit" class="btn btn-success">Créer la recette</button>
        <a href="{{ route('recettes.index') }}" class="btn btn-secondary">Annuler</a>
    </form>
</div>
@endsection
