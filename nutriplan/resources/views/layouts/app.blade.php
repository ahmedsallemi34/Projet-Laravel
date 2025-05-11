<!DOCTYPE html>
<html>
<head> 
    <!-- Bootstrap CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css">
    <link rel="stylesheet" href="{{ asset('css/app.css') }}">
    <title>@yield('title', 'Nutriplan')</title>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.10.5/font/bootstrap-icons.css">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css">
</head>
<!-- Bootstrap JS Bundle (avec Popper inclus) -->
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js"></script>

<body>

    <!-- NAVBAR (affichée sauf sur la page users/login) -->
    @if (!request()->is('login'))
        <nav class="navbar navbar-expand-lg navbar-dark bg-dark">
            <div class="container">
                <a class="navbar-brand" href="#">Nutriplan</a>
                <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav">
                    <span class="navbar-toggler-icon"></span>
                </button>

                <div class="collapse navbar-collapse" id="navbarNav">
                    <ul class="navbar-nav ms-auto">
                        <li class="nav-item">
                            <a class="nav-link" href="{{ route('plans.index') }}">Plans</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" href="{{ route('ingredients.index') }}">Ingrédients</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" href="{{ route('recettes.index') }}">Recettes</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" href="{{ route('users.index') }}">Utilisateurs</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" href="{{ route('gestionnaire.dashboard') }}">Gestionnaire</a>
                        </li>

                        @if(session('user_id'))
                            <li class="nav-item">
                                <form action="{{ route('logout') }}" method="POST" class="d-inline">
                                    @csrf
                                    <button type="submit" class="btn btn-link nav-link">Déconnexion</button>
                                </form>
                            </li>
                        @else
                            <li class="nav-item">
                                <a class="nav-link" href="{{ route('users.login') }}">Connexion</a>
                            </li>
                        @endif
                    </ul>
                </div>
            </div>
        </nav>
    @endif

    <!-- CONTENU DE LA PAGE -->
    <div class="container mt-4">
        @yield('content')
    </div>

    <!-- Bootstrap JS -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>
