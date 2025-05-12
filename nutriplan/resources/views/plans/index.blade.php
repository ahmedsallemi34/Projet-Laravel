@extends('layouts.app')

@section('title', 'Mes Plans Alimentaires')

@section('content')

<div class="container">


    {{-- TITRE AMÉLIORÉ --}}
    <h1 class="text-center mb-5" style="font-size: 2.5rem; font-weight: bold; text-transform: uppercase; color: #2c3e50; letter-spacing: 1px;">
        Mes Plans Alimentaires <span style="color: #e74c3c; font-size: 2.8rem;">🍎</span>
        <br>
        <span style="font-size: 1.3rem; font-style: italic; color: #16a085;">Conseils Nutritionnels</span>
    </h1>

    {{-- MESSAGE DE SUCCÈS --}}
    @if(session('success'))
        <div class="alert alert-success">
            {{ session('success') }}
        </div>
    @endif

    {{-- BOUTON AJOUTER --}}
    @if (session('user_id') === 1)
        <div class="text-end mb-3">
            <a href="{{ route('plans.create') }}" class="btn btn-glass">➕ Ajouter un plan</a>
        </div>
    @endif

    {{-- PLANS --}}
    @if ($plans->isEmpty())
        <div class="text-center text-muted">
            <p>Vous n'avez pas encore de plans alimentaires.</p>
        </div>
    @else
        <div class="row">
            @foreach ($plans as $plan)
                <div class="col-md-6 col-lg-4 mb-4">
                    <div class="glass-card" style="padding: 15px; border-radius: 10px; background: rgba(44, 62, 80, 0.8);">
                        {{-- Image depuis lien externe --}}
                        @php
                            $images = [
                                "https://images.pexels.com/photos/1640777/pexels-photo-1640777.jpeg",
                                "https://images.pexels.com/photos/1640775/pexels-photo-1640775.jpeg",
                                "https://images.pexels.com/photos/1640773/pexels-photo-1640773.jpeg"
                            ];
                            $imgSrc = $images[$loop->index % count($images)];
                        @endphp

                        <img src="{{ $imgSrc }}" class="img-fluid rounded mb-3" alt="Nutrition Image" style="height: 150px; object-fit: cover;">

                        {{-- Titre du plan --}}
                        <h4 class="text-white" style="font-size: 1.6rem; font-weight: 600;">{{ ucfirst($plan->jour) }} - {{ $plan->repas }}</h4>

                        {{-- Contenu du plan --}}
                        @if ($plan->recette)
                            <p class="text-white" style="font-size: 1.2rem; color: #f39c12; font-weight: bold;">
                                <strong>{{ $plan->recette->titre }}</strong>
                            </p>
                            <p class="text-light" style="font-size: 1rem; font-style: italic; color: #bdc3c7;">{{ Str::limit($plan->recette->description, 80) }}</p>
                            <ul class="text-white text-start" style="font-size: 1rem; color: #ecf0f1;">
                                @foreach ($plan->recette->ingredients as $ingredient)
                                    <li>🧂 {{ $ingredient->nom }} - {{ $ingredient->calories }} kcal</li>
                                @endforeach
                            </ul>
                            <a href="{{ route('recettes.show', $plan->recette->id) }}" class="btn btn-glass btn-sm mt-2" style="color: #2ecc71;">Voir la recette</a>
                        @else
                            <p class="text-white">Aucune recette associée.</p>
                        @endif
                    </div>
                </div>
            @endforeach
        </div>
    @endif
</div>

@endsection