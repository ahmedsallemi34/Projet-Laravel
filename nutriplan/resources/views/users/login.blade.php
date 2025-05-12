@extends('layouts.app')

@section('title', 'Connexion')

@section('content')
<div class="login-wrapper">
    <div class="login-card">
        <div class="avatar">
            <i class="bi bi-person-circle-fill"></i>
        </div>
        <h2>Se connecter à Nutriplan</h2>

        <form action="{{ route('users.login') }}" method="POST">
            @csrf

            <div class="mb-3">
                <label for="email" class="form-label"><i class="bi bi-person-fill me-2"></i> Adresse e-mail</label>
                <div class="input-group">
                    <input type="email" name="email" class="form-control" value="{{ old('email') }}" placeholder="Entrer votre email" required>
                    <span class="input-group-text"><i class="bi bi-at"></i></span>
                </div>
                @error('email')
                    <div class="text-danger">{{ $message }}</div>
                @enderror
            </div>

            <div class="mb-3">
                <label for="password" class="form-label"><i class="bi bi-key-fill me-2"></i> Mot de passe</label>
                <div class="input-group">
                    <input type="password" name="password" class="form-control" placeholder="Entrer votre mot de passe" required>
                    <span class="input-group-text"><i class="bi bi-lock-fill"></i></span>
                </div>
                @error('password')
                    <div class="text-danger">{{ $message }}</div>
                @enderror
            </div>

            <button type="submit" class="btn btn-primary"><i class="bi bi-box-arrow-in-right me-2"></i> Se connecter</button>
        </form>

        <div class="mt-4 text-center">
            <p>Pas encore de compte ?</p>
            <a href="{{ route('register') }}" class="btn btn-outline-success"><i class="bi bi-person-plus-fill me-2"></i> Créer un compte</a>
        </div>
    </div>
    <div class="login-image-container">
    <img src="{{ asset('images/Gemini_Generated_Image_dil91hdil91hdil9.png') }}" alt="Image de connexion/sécurité" class="login-image">
</div>
</div>

<style>
    body {
    background-color: #4a5568;
    font-family: 'Segoe UI', sans-serif;
    color: #f7fafc;
    margin: 0;
}

main.login-wrapper {
    display: flex;
    justify-content: space-between;
    align-items: center;
    min-height: 80vh; /* ou 100vh si tu veux centrer */
}


    .login-wrapper {
        width: 100%;
        max-width: 800px; /* Agrandissement de la largeur maximale pour l'image */
        padding: 20px;
        display: flex;
        justify-content: space-between; /* Espace entre le box et l'image */
        align-items: center;
    }

    .login-card {
        background-color: #374151; /* Fond plus foncé pour la carte */
        border-radius: 10px;
        padding: 35px; /* Augmentation du padding intérieur */
        box-shadow: 0 4px 6px rgba(0, 0, 0, 0.2);
        color: #f7fafc;
        width: 100%; /* Ajustement de la largeur du box */
    }

    .avatar {
        text-align: center;
        margin-bottom: 25px; /* Augmentation de la marge sous l'avatar */
    }

    .avatar i {
        font-size: 3.5em; /* Agrandissement de l'icône de l'avatar */
        color: #f7fafc;
    }

    .login-card h2 {
        text-align: center;
        margin-bottom: 30px; /* Augmentation de la marge sous le titre */
        color: #f7fafc;
        font-size: 1.75rem; /* Légère augmentation de la taille du titre */
    }

    .form-label {
        font-weight: bold;
        color: #d2d6dc;
        margin-bottom: 0.6rem;
        display: block;
    }

    .form-control {
        background-color: #4a5568;
        border: 1px solid #6b7280;
        color: #f7fafc;
        border-radius: 5px;
        padding: 0.8rem; /* Légère augmentation du padding des inputs */
        font-size: 1rem; /* Légère augmentation de la taille du texte des inputs */
    }

    .form-control::placeholder {
        color: #a1aab7;
    }

    .form-control:focus {
        outline: none;
        border-color: #9ca3af;
        box-shadow: 0 0 0 0.2rem rgba(147, 197, 253, 0.25);
    }

    .input-group {
        display: flex;
        align-items: center;
        border-radius: 5px;
        overflow: hidden;
        margin-bottom: 1.2rem; /* Augmentation de la marge sous les groupes d'inputs */
    }

    .input-group .form-control {
        border-right: none;
        border-radius: 5px 0 0 5px;
    }

    .input-group-text {
        background-color: #4a5568;
        color: #d2d6dc;
        border: 1px solid #6b7280;
        padding: 0.8rem; /* Légère augmentation du padding du texte de l'input group */
        border-left: none;
    }

    .btn-primary {
        background-color: #6366f1;
        border: none;
        color: #f7fafc;
        padding: 0.8rem 1.75rem; /* Légère augmentation du padding du bouton */
        border-radius: 5px;
        cursor: pointer;
        width: 100%;
        transition: background-color 0.2s ease-in-out;
        font-size: 1rem; /* Légère augmentation de la taille du texte du bouton */
    }

    .btn-primary:hover {
        background-color: #4f46e5;
    }

    .btn-outline-success {
        border: 1px solid #22c55e;
        color: #22c55e;
        background-color: transparent;
        padding: 0.75rem 1.5rem;
        border-radius: 5px;
        transition: background-color 0.2s ease-in-out, color 0.2s ease-in-out;
    }

    .btn-outline-success:hover {
        background-color: #22c55e;
        color: #f7fafc;
    }

    .text-center p {
        color: #d2d6dc;
        margin-top: 1.2rem; /* Augmentation de la marge au-dessus du lien "Pas encore de compte ?" */
        font-size: 1rem; /* Légère augmentation de la taille du texte */
    }

    .text-danger {
        color: #f44336 !important;
        font-size: 0.875rem;
        margin-top: 0.25rem;
    }

    .logout-icon {
        position: absolute;
        top: 20px;
        right: 20px;
    }

    .logout-icon a {
        text-decoration: none;
    }

    .login-image-container {
        width: 45%; /* Ajustement de la largeur du conteneur de l'image */
        display: flex;
        justify-content: center;
        align-items: center;
    }

    .login-image {
        max-width: 100%;
        height: auto;
        border-radius: 10px;
        box-shadow: 0 4px 6px rgba(0, 0, 0, 0.2);
    }
</style>
@endsection