@extends('layouts.app')

@section('title', 'Liste des Recettes')

@section('content')
<div class="container py-4">

    <h1 class="text-center mb-4 text-light">📖 Liste des Recettes</h1>

    @if(session('success'))
        <div class="alert alert-success glass-sm p-3">{{ session('success') }}</div>
    @endif

    @if (session('user_id')===1)
        <div class="text-center mb-4">
            <a href="{{ route('recettes.create') }}" class="btn btn-success px-4 py-2 shadow">➕ Ajouter une recette</a>
        </div>
    @endif

    @if($recettes->isEmpty())
        <div class="alert alert-warning glass-sm text-center">Aucune recette disponible pour le moment.</div>
    @else
        <div class="table-responsive rounded recipe-table-container p-3 shadow">
            <table class="table table-hover text-light align-middle">
                <thead class="recipe-table-head rounded">
                    <tr>
                        <th class="text-center">Titre</th>
                        <th class="text-center">Description</th>
                        <th class="text-center">Ingrédients</th>
                        <th class="text-center">Actions</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach($recettes as $recette)
                        <tr>
                            <td>{{ $recette->titre }}</td>
                            <td>{{ $recette->description }}</td>
                            <td>
                                <ul class="mb-0 small text-light-50">
                                    @foreach($recette->ingredients as $ingredient)
                                        <li>{{ $ingredient->nom }} ({{ $ingredient->calories }} kcal)</li>
                                    @endforeach
                                </ul>
                            </td>
                            <td class="text-center">
                                <a href="{{ route('recettes.show', $recette->id) }}" class="btn btn-info btn-sm mb-1 recipe-button"><i class="bi bi-eye-fill me-1"></i> Voir</a>
                                @if (session('user_id')===1)
                                    <a href="{{ route('recettes.edit', $recette->id) }}" class="btn btn-warning btn-sm mb-1 recipe-button"><i class="bi bi-pencil-fill me-1"></i> Modifier</a>
                                    <form action="{{ route('recettes.destroy', $recette->id) }}" method="POST" class="d-inline" onsubmit="return confirm('Supprimer cette recette ?')">
                                        @csrf
                                        @method('DELETE')
                                        <button type="submit" class="btn btn-danger btn-sm recipe-button"><i class="bi bi-trash-fill me-1"></i> Supprimer</button>
                                    </form>
                                @endif
                            </td>
                        </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
    @endif
</div>

<div class="bg-image" style="position: fixed; top: 0; left: 0; width: 100%; height: 100%; z-index: -1; opacity: 0.3;
    background-image: url('https://images.unsplash.com/photo-1555939594-58d7cb644e52?q=80&w=2070&auto=format&fit=crop&ixlib=rb-4.0.3&ixid=M3wxMjA3fDB8MHxwaG90by1wYWdlfHx8fGVufDB8fHx8fA%3D%3D');
    background-size: cover; background-position: center;">
</div>

<div class="floating-image" style="position: absolute; top: 10%; right: 5%; width: 150px; z-index: 1; opacity: 0.4; border-radius: 10px; overflow: hidden;">
    <img src="https://images.unsplash.com/photo-1565958011703-44f9829ba187?q=80&w=1965&auto=format&fit=crop&ixlib=rb-4.0.3&ixid=M3wxMjA3fDB8MHxwaG90by1wYWdlfHx8fGVufDB8fHx8fA%3D%3D" alt="Décoration culinaire" style="width: 100%; height: auto; display: block;">
</div>



<style>
    body {
        background-color: #4a5568; /* Gris-bleu foncé */
        font-family: 'Segoe UI', sans-serif;
        color: #f7fafc; /* Couleur de texte par défaut pour la page */
    }

    .glass {
        background: rgba(255, 255, 255, 0.1);
        border-radius: 16px;
        backdrop-filter: blur(10px);
        -webkit-backdrop-filter: blur(10px);
        border: 1px solid rgba(255, 255, 255, 0.2);
        box-shadow: 0 4px 30px rgba(0, 0, 0, 0.1);
    }

    .glass-sm {
        background: rgba(255, 255, 255, 0.15);
        backdrop-filter: blur(8px);
        -webkit-backdrop-filter: blur(8px);
        border-radius: 12px;
        color: #f7fafc; /* Texte blanc cassé pour l'alerte */
        border: 1px solid rgba(255, 255, 255, 0.2);
        box-shadow: 0 2px 10px rgba(0, 0, 0, 0.05);
    }

    .recipe-table-container {
        background-color: #4a5568; /* Fond gris-bleu foncé pour le conteneur du tableau */
    }

    .table {
        background-color: transparent; /* Le fond du tableau interne est transparent */
        border-collapse: collapse; /* Supprime les bordures doubles */
    }

    .recipe-table-head th {
        background-color: rgba(0, 0, 0, 0.2); /* En-tête légèrement sombre et transparent */
        border-bottom: 1px solid rgba(255, 255, 255, 0.1);
        padding: 0.75rem;
        text-align: center;
        color: #f7fafc; /* Texte blanc cassé pour l'en-tête */
    }

    .table tbody td {
        border-bottom: 1px solid rgba(255, 255, 255, 0.05);
        padding: 0.75rem;
    }

    .table tbody tr:hover {
        background-color: rgba(255, 255, 255, 0.05); /* Léger effet au survol */
    }

    .table ul {
        padding-left: 1rem;
        margin-bottom: 0;
    }

    .btn {
        border-radius: 8px;
        transition: background-color 0.3s ease, color 0.3s ease;
    }

    .recipe-button {
        background-color: transparent;
        border-color: #f7fafc;
        color: #f7fafc;
    }

    .recipe-button:hover {
        background-color: rgba(255, 255, 255, 0.1);
    }

    .btn-success {
        background-color: rgba(144, 238, 144, 0.7);
        border-color: transparent;
        color: #333; /* Texte plus foncé pour le bouton success */
    }

    .btn-success:hover {
        background-color: rgba(144, 238, 144, 0.9);
    }

    .btn-warning {
        background-color: rgba(255, 215, 0, 0.7);
        border-color: transparent;
        color: #333; /* Texte plus foncé pour le bouton warning */
    }

    .btn-warning:hover {
        background-color: rgba(255, 215, 0, 0.9);
    }

    .btn-danger {
        background-color: rgba(255, 99, 71, 0.7);
        border-color: transparent;
        color: #f7fafc; /* Texte clair pour le bouton danger */
    }

    .btn-danger:hover {
        background-color: rgba(255, 99, 71, 0.9);
    }

    .btn-info {
        background-color: rgba(173, 216, 230, 0.7);
        border-color: transparent;
        color: #333; /* Texte plus foncé pour le bouton info */
    }

    .btn-info:hover {
        background-color: rgba(173, 216, 230, 0.9);
    }

    .bi {
        font-size: 0.9rem;
    }
</style>
@endsection