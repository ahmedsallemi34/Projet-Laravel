@extends('layouts.app')

@section('title', 'Modifier un ingrédient')

@section('content')
<div class="container">
    <h1>Modifier l'ingrédient : {{ $ingredient->nom }}</h1>

    <form action="{{ route('ingredients.update', $ingredient->id) }}" method="POST">
        @csrf
        @method('PUT')

        <div class="mb-3">
            <label for="nom" class="form-label">Nom</label>
            <input type="text" name="nom" value="{{ $ingredient->nom }}" class="form-control" required>
        </div>

        <div class="mb-3">
            <label for="calories" class="form-label">Calories</label>
            <input type="number" name="calories" value="{{ $ingredient->calories }}" class="form-control" required>
        </div>

        <div class="mb-3">
            <label for="protéine" class="form-label">Protéines (g)</label>
            <input type="number" step="0.1" name="protéine" value="{{ $ingredient->protéine }}" class="form-control" required>
        </div>

        <button type="submit" class="btn btn-primary">Mettre à jour</button>
        <a href="{{ route('ingredients.index') }}" class="btn btn-secondary">Annuler</a>
    </form>
</div>
@endsection
