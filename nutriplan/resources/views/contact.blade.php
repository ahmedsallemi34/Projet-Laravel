<!-- resources/views/contact.blade.php -->
<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Page de Contact</title>

    <!-- Lien vers un fichier CSS externe -->
    <link rel="stylesheet" href="{{ asset('css/style.css') }}">

    <!-- Google Material Icons -->
    <link href="https://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet">

    <style>
        /* Style global */
        body {
            font-family: 'Roboto', sans-serif;
            background-color: #f5f5f5;
            margin: 0;
            padding: 0;
            display: flex;
            justify-content: center;
            align-items: center;
            height: 100vh;
            color: #333;
        }

        .contact-container {
            background: #ffffff;
            border-radius: 10px;
            box-shadow: 0 4px 20px rgba(0, 0, 0, 0.1);
            padding: 2rem;
            width: 100%;
            max-width: 600px;
        }

        h1 {
            text-align: center;
            margin-bottom: 1rem;
            color: #2c3e50;;
            font-size: 2rem;
        }

        p {
            text-align: center;
            margin-bottom: 2rem;
            color: #555;
        }

        .form-group {
            margin-bottom: 1.5rem;
        }

        label {
            font-size: 1rem;
            font-weight: bold;
            color: #333;
            margin-bottom: 0.5rem;
            display: block;
        }

        input, textarea {
            width: 100%;
            padding: 0.8rem;
            border-radius: 8px;
            border: 1px solid #ccc;
            background-color: #fafafa;
            font-size: 1rem;
            color: #333;
            box-sizing: border-box;
        }

        input:focus, textarea:focus {
            outline: none;
            border-color: #2c3e50;
            box-shadow: 0 0 5px rgba(76, 175, 80, 0.5);
        }

        button {
            background-color: #2c3e50;
            color: white;
            border: none;
            padding: 1rem 2rem;
            border-radius: 8px;
            cursor: pointer;
            width: 100%;
            font-size: 1rem;
            transition: background-color 0.3s;
        }

        button:hover {
            background-color: #2c3e50;
        }

        .material-icons {
            vertical-align: middle;
            margin-right: 8px;
        }

        .form-group input, .form-group textarea {
            font-size: 1rem;
        }
    </style>
</head>
<body>
    <div class="contact-container">
        <h1>Contactez-nous</h1>
        <p>Si vous avez des questions, remplissez ce formulaire et nous reviendrons vers vous dès que possible.</p>

        <!-- Formulaire de contact -->
        <form action="/submit-contact" method="POST">
            @csrf

            <!-- Nom -->
            <div class="form-group">
                <label for="name">
                    <i class="material-icons">person</i> Nom :
                </label>
                <input type="text" id="name" name="name" required>
            </div>

            <!-- Email -->
            <div class="form-group">
                <label for="email">
                    <i class="material-icons">email</i> Email :
                </label>
                <input type="email" id="email" name="email" required>
            </div>

            <!-- Message -->
            <div class="form-group">
                <label for="message">
                    <i class="material-icons">message</i> Message :
                </label>
                <textarea id="message" name="message" rows="4" required></textarea>
            </div>

            <button type="submit">
                <i class="material-icons">send</i> Envoyer
            </button>
        </form>
    </div>
</body>
</html>
