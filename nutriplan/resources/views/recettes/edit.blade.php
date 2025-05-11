@extends('layouts.app')

@section('title', 'Modifier la Recette')

@section('content')
<div class="container">
    <h1>Modifier la recette : {{ $recette->titre }}</h1>

    @if ($errors->any())
        <div class="alert alert-danger">
            <ul>
                @foreach($errors->all() as $error)
                    <li>{{ $error }}</li>
                @endforeach
            </ul>
        </div>
    @endif

    <form action="{{ route('recettes.update', $recette->id) }}" method="POST">
        @csrf
        @method('PUT')

        <div class="mb-3">
            <label for="titre" class="form-label">Titre</label>
            <input type="text" name="titre" id="titre" class="form-control" value="{{ old('titre', $recette->titre) }}" required>
        </div>

        <div class="mb-3">
            <label for="description" class="form-label">Description</label>
            <textarea name="description" id="description" class="form-control" rows="4" required>{{ old('description', $recette->description) }}</textarea>
        </div>

        <div class="mb-3">
            <label for="ingredients" class="form-label">Ingrédients</label>
            <select name="ingredients[]" id="ingredients" class="form-select" multiple required>
                @foreach ($ingredients as $ingredient)
                    <option value="{{ $ingredient->id }}"
                        {{ in_array($ingredient->id, $recette->ingredients->pluck('id')->toArray()) ? 'selected' : '' }}>
                        {{ $ingredient->nom }} ({{ $ingredient->calories }} kcal)
                    </option>
                @endforeach
            </select>
        </div>

        <button type="submit" class="btn btn-primary">Enregistrer les modifications</button>
        <a href="{{ route('recettes.index') }}" class="btn btn-secondary">Annuler</a>
    </form>
</div>
@endsection
