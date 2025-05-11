@extends('layouts.app')

@section('title', $recette->titre)

@section('content')
<div class="container">
    <h1>{{ $recette->titre }}</h1>

    <p class="text-muted">{{ $recette->description }}</p>

    <h4>Ingrédients :</h4>
    @if($recette->ingredients->isEmpty())
        <p>Aucun ingrédient associé.</p>
    @else
        <ul class="list-group mb-3">
            @foreach($recette->ingredients as $ingredient)
                <li class="list-group-item d-flex justify-content-between align-items-center">
                    {{ $ingredient->nom }}
                    <span class="badge bg-info text-dark">
                        {{ $ingredient->calories }} kcal - {{ $ingredient->protéine }}g protéines
                    </span>
                </li>
            @endforeach
        </ul>
    @endif

    @if (session('user_id')===1)
    <a href="{{ route('recettes.edit', $recette->id) }}" class="btn btn-warning">Modifier</a>
    @else                        
    @endif
    <a href="{{ route('recettes.index') }}" class="btn btn-secondary">Retour</a>
</div>
@endsection
