<!DOCTYPE html>
<html lang="fr">
    <nav class="navbar">
    <div class="nav-container">
        <div class="nav-logo">Nutriplan</div>
        <div class="nav-links">
            <a href="login">Login</a>
            <a href="apropos">À propos</a>
            <a href="{{ route('contact') }}">Contact</a>
        </div>
    </div>
</nav>
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Page d'Accueil</title>
    <link href="https://fonts.googleapis.com/css2?family=Roboto:wght@400;700&display=swap" rel="stylesheet">

    <style>
        * {
            box-sizing: border-box;
        }

        body {
            margin: 0;
            padding: 0;
            font-family: 'Roboto', sans-serif;
            background: url('https://images.unsplash.com/photo-1506744038136-46273834b3fb') no-repeat center center fixed;
            background-size: cover;
            color: white;
        }

        .overlay {
            background: rgba(44, 62, 80, 0.6);
            backdrop-filter: blur(10px);
            min-height: 100vh;
            display: flex;
            justify-content: center;
            align-items: center;
            padding: 40px;
        }

        .container {
            background: rgba(255, 255, 255, 0.1);
            padding: 40px;
            border-radius: 20px;
            max-width: 700px;
            width: 100%;
            text-align: center;
            box-shadow: 0 8px 32px 0 rgba(0,0,0,0.37);
            backdrop-filter: blur(10px);
        }

        h1 {
            font-size: 3rem;
            margin-bottom: 20px;
        }

        p {
            font-size: 1.25rem;
            color: #ecf0f1;
            margin-bottom: 30px;
        }

        .btn-contact {
            padding: 12px 30px;
            font-size: 1rem;
            background-color: #2c3e50;
            color: white;
            text-decoration: none;
            border: none;
            border-radius: 8px;
            cursor: pointer;
            transition: background-color 0.3s ease;
        }

        .btn-contact:hover {
            background-color: #18bc9c;
        }

        .image-section {
            margin-top: 30px;
        }

        .image-section img {
            max-width: 100%;
            border-radius: 12px;
            box-shadow: 0 4px 20px rgba(0,0,0,0.3);
        }
        .navbar {
    position: fixed;
    top: 0;
    width: 100%;
    background-color: rgba(44, 62, 80, 0.85);
    backdrop-filter: blur(10px);
    z-index: 1000;
    padding: 15px 0;
    box-shadow: 0 4px 12px rgba(0,0,0,0.3);
}

.nav-container {
    max-width: 1200px;
    margin: 0 auto;
    padding: 0 30px;
    display: flex;
    justify-content: space-between;
    align-items: center;
}

.nav-logo {
    font-size: 1.5rem;
    font-weight: bold;
    color: white;
}

.nav-links a {
    color: white;
    margin-left: 20px;
    text-decoration: none;
    font-weight: 500;
    transition: color 0.3s ease;
}

.nav-links a:hover {
    color: #18bc9c;
}

.overlay {
    padding-top: 100px; /* Make space for navbar */
}

    </style>
</head>
<body>

<div class="overlay">
    <div class="container">
        <h1>Bienvenue sur Nutriplan</h1>
        <p>Découvrez une plateforme dédiée à l’alimentation saine, aux conseils nutritionnels et au bien-être durable.</p>
        <a href="{{ route('contact') }}" class="btn-contact">Contactez-nous</a>

        <div class="image-section">
            <img src="https://images.unsplash.com/photo-1546069901-ba9599a7e63c" alt="Nutrition et bien-être">
        </div>
    </div>
</div>

</body>
</html>
