<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Accueil Client</title>
    <style>
        body {
            font-family: Arial, sans-serif;
            color: #333;
            margin: 0;
            padding: 0;
            background: linear-gradient(135deg, #bbc9f1, #9fe4a3);
        }
        .navbar {
            display: flex;
            justify-content: space-between;
            align-items: center;
            padding: 1rem;
            background: linear-gradient(135deg, #13281c, #9fe4a3);
            height: 60px;
            color: #fff;
        }
        .navbar .logo img {
            height: 40px;
        }
        .navbar .links {
            display: flex;
            gap: 1rem;
            
        }
        .navbar .links a {
            text-decoration: none;
            color: #191414;
            padding: 0.5rem;
        }

        .navbar .links a:hover {
            text-decoration:none;
            box-shadow: #13281c;
        }

        .container {
            margin: 2rem;
        }

        .welcome-message {
            margin-bottom: 2rem;
            text-align: center;
            color: #333;
        }

        .logo {
            max-width: 300px;
        }

        .buttons {

            text-align: center;
            margin-top: 10rem;
            border-radius: 100px;
        }

        .buttons a {
            text-decoration: none;
            background-color: #007bff;
            color: #fff;
            padding: 0.75rem 1.5rem;
            border-radius: 30px;
            margin: 0 1rem;
            transition: background-color 0.3s ease, transform 0.3s ease;
            display: inline-block;
            transform: translateY(0);
        }

        .buttons a:hover {
            background-color: #0056b3;
            transform: translateY(-5px); /* Translation vers le haut */
        }
    </style>
</head>
<body>
    <div class="navbar">
        <div class="logo">
            <img src="{{ asset('images/logo1.png') }}" alt="Logo">
        </div>
        <div class="links">
            <a href="{{ route('client.reclamations') }}">Mes Réclamations</a>
            <a href="{{ route('client.reclamation.create') }}">Déposer une Réclamation</a>
            <a href="{{ route('client.logout') }}">Déconnexion</a>
            <a href="{{ route('client.read') }}">Read More</a>
        </div>
    </div>

    <div class="container">
        <div class="welcome-message">
            <h1>Bienvenue, {{ Auth::guard('client')->user()->prenom }} !</h1>
            <p>
                Nous sommes ravis de vous accueillir sur notre plateforme de gestion des réclamations.
                Ici, vous pouvez facilement soumettre de nouvelles réclamations, consulter vos réclamations précédentes,
                et suivre l'état de vos demandes. Notre objectif est de vous offrir une expérience fluide et efficace
                pour résoudre vos préoccupations rapidement.
            </p>
        </div>
        <div class="buttons">
            <a href="{{ route('client.reclamation.create') }}">Déposer une Réclamation</a>
            <a href="{{ route('client.reclamations') }}">Consulter les Réclamations</a>
        </div>
    </div>
</body>
</html>
