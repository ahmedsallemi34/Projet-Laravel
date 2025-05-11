@extends('layouts.app')

@section('title', 'Gestion des Ingrédients')

@section('content')
<div class="container py-4">

    <h1 class="text-center mb-4">🍽️ Ingrédients</h1>

    <!-- Message d’intro amélioré -->
    <div class="p-4 mb-4 bg-light border-start border-5 border-success rounded shadow-sm">
        <h5 class="mb-2"><i class="bi bi-leaf-fill text-success"></i> Bienvenue sur la gestion des ingrédients</h5>
        <p class="mb-0">Consultez et gérez vos ingrédients nutritionnels ci-dessous. Cliquez sur "Ajouter" pour enrichir votre base d’aliments.</p>
    </div>

    <!-- Galerie d'images avec effet hover -->
    <div class="d-flex flex-wrap gap-3 justify-content-center mb-4">
        <img src="https://cdn.pixabay.com/photo/2014/12/21/23/28/recipe-575434_1280.png" alt="Légumes" class="img-thumbnail ingredient-img">
    </div>

    <!-- Bouton ajouter centré -->
    @if (session('user_id')===1)
        <div class="text-center mb-4">
            <a href="{{ route('ingredients.create') }}" class="btn btn-success btn-lg px-4">➕ Ajouter un ingrédient</a>
        </div>
    @endif

    @if(session('success'))
        <div class="alert alert-success">{{ session('success') }}</div>
    @endif

    @if ($ingredients->isEmpty())
        <div class="alert alert-warning text-center">Aucun ingrédient trouvé.</div>
    @else
        <!-- Tableau stylisé -->
        <div class="table-responsive shadow-sm">
            <table class="table table-striped table-hover border rounded text-center align-middle">
                <thead class="table-dark">
                    <tr>
                        <th>Nom</th>
                        <th>Calories</th>
                        <th>Protéines</th>
                        <th>Actions</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach($ingredients as $ingredient)
                        <tr>
                            <td>{{ $ingredient->nom }}</td>
                            <td>{{ $ingredient->calories }} kcal</td>
                            <td>{{ $ingredient->protéine }} g</td>
                            <td>
                                @if (session('user_id')===1)
                                    <a href="{{ route('ingredients.edit', $ingredient->id) }}" class="btn btn-outline-warning btn-sm me-1">✏️ Modifier</a>

                                    <form action="{{ route('ingredients.destroy', $ingredient->id) }}" method="POST" class="d-inline" onsubmit="return confirm('Confirmer la suppression ?')">
                                        @csrf
                                        @method('DELETE')
                                        <button type="submit" class="btn btn-outline-danger btn-sm">🗑️ Supprimer</button>
                                    </form>
                                @else
                                    <span class="text-muted">Aucune action disponible</span>
                                @endif
                            </td>
                        </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
    @endif
</div>

<!-- Style personnalisé -->
<style>
    .ingredient-img {
        width: 170px;
        height: 120px;
        object-fit: cover;
        border-radius: 12px;
        transition: transform 0.3s ease, box-shadow 0.3s ease;
    }
    .ingredient-img:hover {
        transform: scale(1.05);
        box-shadow: 0 8px 16px rgba(0, 0, 0, 0.2);
    }
</style>
@endsection
