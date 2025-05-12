<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Page d'Accueil</title>
    <link href="https://fonts.googleapis.com/css2?family=Roboto:wght@400;700&display=swap" rel="stylesheet">
    <style>
        * {
            box-sizing: border-box;
        }

        html {
            scroll-behavior: smooth;
        }

        body {
            margin: 0;
            padding: 0;
            font-family: 'Roboto', sans-serif;
            background: url('https://images.unsplash.com/photo-1506744038136-46273834b3fb') no-repeat center center fixed;
            background-size: cover;
            color: white;
        }

        nav {
            background-color: #2c3e50;
            padding: 15px 30px;
            display: flex;
            justify-content: space-between;
            align-items: center;
            position: fixed;
            width: 100%;
            top: 0;
            z-index: 1000;
        }

        .nav-logo {
            font-size: 1.5rem;
            font-weight: bold;
            color: white;
            text-decoration: none;
        }

        .nav-links a {
            color: white;
            margin-left: 20px;
            text-decoration: none;
            font-size: 1rem;
            transition: color 0.3s;
        }

        .nav-links a:hover {
            color: #18bc9c;
        }

        .overlay {
            background: rgba(44, 62, 80, 0.6);
            backdrop-filter: blur(10px);
            min-height: 100vh;
            display: flex;
            justify-content: center;
            align-items: center;
            padding: 40px;
            padding-top: 100px;
        }

        .container {
            background: rgba(255, 255, 255, 0.1);
            padding: 40px;
            border-radius: 20px;
            max-width: 700px;
            width: 100%;
            text-align: center;
            box-shadow: 0 8px 32px rgba(0,0,0,0.37);
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

        #apropos {
            padding: 80px 20px;
            background: rgba(0,0,0,0.6);
            text-align: center;
        }

        #apropos h2 {
            font-size: 2rem;
            margin-bottom: 20px;
        }

        #apropos p {
            max-width: 800px;
            margin: auto;
            font-size: 1.1rem;
            color: #ddd;
        }
    </style>
</head>
<body>

<nav>
    <a href="/" class="nav-logo">Nutriplan</a>
    <div class="nav-links">
        <a href="/">Accueil</a>
        <a href="apropos">À propos</a>
        <a href="{{ route('login') }}">Login</a>
        <a href="{{ route('contact') }}">Contact</a>
    </div>
</nav>



<section id="apropos">
    <h2>À propos de Nutriplan</h2>
    <p>
        Nutriplan est votre allié pour adopter un mode de vie équilibré. Grâce à nos conseils pratiques, plans nutritionnels personnalisés
        et ressources éducatives, nous vous aidons à atteindre vos objectifs de santé tout en respectant l’environnement.
    </p>
</section>

</body>
</html>
