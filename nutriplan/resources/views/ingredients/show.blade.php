@extends('layouts.app')

@section('title', 'Détail de l\'ingrédient')

@section('content')
<div class="container">
    <h1>Détail de l'ingrédient</h1>

    <div class="card">
        <div class="card-body">
            <h5 class="card-title">{{ $ingredient->nom }}</h5>
            <p><strong>Calories :</strong> {{ $ingredient->calories }}</p>
            <p><strong>Protéines :</strong> {{ $ingredient->protéine }} g</p>
        </div>
    </div>

    <a href="{{ route('ingredients.edit', $ingredient->id) }}" class="btn btn-primary mt-3">Modifier</a>
    <a href="{{ route('ingredients.index') }}" class="btn btn-secondary mt-3">Retour</a>
</div>
@endsection
