{{-- resources/views/plans/edit.blade.php --}}
@extends('layouts.app')

@section('title', 'Modifier un plan alimentaire')

@section('content')
<div class="container">
    <h1>Modifier le plan alimentaire</h1>

    @if ($errors->any())
        <div class="alert alert-danger">
            <ul>
                @foreach($errors->all() as $error)
                    <li>{{ $error }}</li>
                @endforeach
            </ul>
        </div>
    @endif

    <form action="{{ route('plans.update', $plan->id) }}" method="POST">
        @csrf
        @method('PUT')

        <div class="mb-3">
            <label for="jour" class="form-label">Jour</label>
            <input type="date" name="jour" id="jour" class="form-control"
                   value="{{ old('jour', $plan->jour) }}" required>
        </div>

        <div class="mb-3">
            <label for="repas" class="form-label">Repas</label>
            <select name="repas" id="repas" class="form-select" required>
                <option value="">-- Choisissez un repas --</option>
                @foreach (['petit-déjeuner','déjeuner','dîner','collation'] as $repas)
                    <option value="{{ $repas }}"
                        {{ old('repas', $plan->repas) === $repas ? 'selected' : '' }}>
                        {{ ucfirst($repas) }}
                    </option>
                @endforeach
            </select>
        </div>

        <div class="mb-3">
            <label for="recette_id" class="form-label">Recette</label>
            <select name="recette_id" id="recette_id" class="form-select" required>
                <option value="">-- Sélectionnez une recette --</option>
                @foreach ($recettes as $recette)
                    <option value="{{ $recette->id }}"
                        {{ old('recette_id', $plan->recette_id) == $recette->id ? 'selected' : '' }}>
                        {{ $recette->titre }}
                    </option>
                @endforeach
            </select>
        </div>

        <button type="submit" class="btn btn-primary">Enregistrer les modifications</button>
        <a href="{{ route('plans.index') }}" class="btn btn-secondary">Annuler</a>
    </form>
</div>
@endsection
