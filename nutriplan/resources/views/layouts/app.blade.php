<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <title>@yield('title', 'Nutriplan')</title>

    <!-- Bootstrap & CSS -->
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.10.5/font/bootstrap-icons.css">
    <link rel="stylesheet" href="{{ asset('css/app.css') }}">

    <!-- Centrage vertical et layout -->
    <style>
        html, body {
            height: 100%;
        }
        body {
            display: flex;
            flex-direction: column;
        }
        main.flex-fill {
            flex: 1 0 auto;
        }
        footer {
            flex-shrink: 0;
        }
    </style>
</head>

<body>
    <!-- NAVBAR spéciale pour la page login -->
    @if (request()->is('login'))
        <nav class="navbar navbar-expand-lg navbar-light bg-light">
            <div class="container">
                <a class="navbar-brand" href="{{ route('home') }}">Nutriplan</a>
                <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarLogin">
                    <span class="navbar-toggler-icon"></span>
                </button>
                <div class="collapse navbar-collapse" id="navbarLogin">
                    <ul class="navbar-nav ms-auto">
                        <li class="nav-item"><a class="nav-link" href="{{ route('home') }}">Accueil</a></li>
                        <li class="nav-item"><a class="nav-link" href="{{ route('about') }}">À propos</a></li>
                        <li class="nav-item"><a class="nav-link" href="{{ route('contact') }}">Contact</a></li>
                    </ul>
                </div>
            </div>
        </nav>

    <!-- NAVBAR pour les autres pages -->
    @else
        <nav class="navbar navbar-expand-lg navbar-dark bg-dark">
            <div class="container">
                <a class="navbar-brand" href="{{ route('home') }}">Nutriplan</a>
                <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav">
                    <span class="navbar-toggler-icon"></span>
                </button>

                <div class="collapse navbar-collapse" id="navbarNav">
                    <ul class="navbar-nav ms-auto">
                        <li class="nav-item"><a class="nav-link" href="{{ route('plans.index') }}">Plans</a></li>
                        <li class="nav-item"><a class="nav-link" href="{{ route('ingredients.index') }}">Ingrédients</a></li>
                        <li class="nav-item"><a class="nav-link" href="{{ route('recettes.index') }}">Recettes</a></li>
                        <li class="nav-item"><a class="nav-link" href="{{ route('users.index') }}">Utilisateurs</a></li>
                        <li class="nav-item"><a class="nav-link" href="{{ route('gestionnaire.dashboard') }}">Gestionnaire</a></li>
                        @if(session('user_id'))
                            <li class="nav-item">
                                <form action="{{ route('logout') }}" method="POST" class="d-inline">
                                    @csrf
                                    <button type="submit" class="btn btn-link nav-link">Déconnexion</button>
                                </form>
                            </li>
                        @else
                            <li class="nav-item"><a class="nav-link" href="{{ route('users.login') }}">Connexion</a></li>
                        @endif
                    </ul>
                </div>
            </div>
        </nav>
    @endif

    <!-- CONTENU PRINCIPAL -->
    <main class="flex-fill d-flex justify-content-center align-items-center" style="min-height: 75vh;">
        <div class="container">
            @yield('content')
        </div>
    </main>

    <!-- FOOTER -->
    <footer class="bg-dark text-white text-center py-4 mt-5">
        <div class="container">
            <p>📞 Téléphone : +212 6 12 34 56 78 | 📍 Adresse : 123 Rue, Casablanca, Maroc</p>
            <p>
                <a href="https://facebook.com/nutriplan" target="_blank" class="text-white mx-1"><i class="bi bi-facebook"></i></a>
                <a href="https://instagram.com/nutriplan" target="_blank" class="text-white mx-1"><i class="bi bi-instagram"></i></a>
                <a href="https://linkedin.com/company/nutriplan" target="_blank" class="text-white mx-1"><i class="bi bi-linkedin"></i></a>
            </p>
        </div>
    </footer>

    <!-- Bootstrap JS -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>
