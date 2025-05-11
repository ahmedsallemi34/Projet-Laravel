@extends('layouts.app')

@section('title', 'Ajouter un ingrédient')

@section('content')
<div class="container">
    <h1 class="mb-4">Ajouter un nouvel ingrédient</h1>

    {{-- Affichage des erreurs --}}
    @if ($errors->any())
        <div class="alert alert-danger">
            <ul class="mb-0">
                @foreach($errors->all() as $error)
                    <li>{{ $error }}</li>
                @endforeach
            </ul>
        </div>
    @endif

    <form action="{{ route('ingredients.store') }}" method="POST">
        @csrf

        {{-- Nom --}}
        <div class="mb-3">
            <label for="nom" class="form-label">Nom</label>
            <input
                type="text"
                id="nom"
                name="nom"
                class="form-control"
                value="{{ old('nom') }}"
                required
            >
        </div>

        {{-- Calories --}}
        <div class="mb-3">
            <label for="calories" class="form-label">Calories</label>
            <input
                type="number"
                id="calories"
                name="calories"
                class="form-control"
                value="{{ old('calories') }}"
                min="0"
                required
            >
        </div>

        {{-- Protéines --}}
        <div class="mb-3">
            <label for="proteine" class="form-label">Protéines (g)</label>
            <input
                type="number"
                id="proteine"
                name="proteine"
                step="0.1"
                class="form-control"
                value="{{ old('proteine') }}"
                min="0"
                required
            >
        </div>

        <button type="submit" class="btn btn-success">Ajouter</button>
        <a href="{{ route('ingredients.index') }}" class="btn btn-secondary">Annuler</a>
    </form>
</div>
@endsection
