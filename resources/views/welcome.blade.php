<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Élection de l'Amicale des Étudiants</title>
    <link href="https://cdn.jsdelivr.net/npm/tailwindcss@2.2.19/dist/tailwind.min.css" rel="stylesheet">
    <style>
        body {
            background-image: url('https://source.unsplash.com/random/1600x900/?students');
            background-size: cover;
            background-position: center;
        }
    </style>
</head>
<body class="flex items-center justify-center min-h-screen">

    <div class="bg-white bg-opacity-90 shadow-lg rounded-lg p-8 max-w-md w-full text-center">
        <h2 class="text-3xl font-bold mb-6 text-blue-600">Élection de l'Amicale des Étudiants</h2>
        <p class="mb-4 text-gray-700">Participez à la vie étudiante en choisissant une option ci-dessous :</p>
        <div class="flex flex-col space-y-4">
            <a href="{{ route('login') }}" class="block bg-blue-500 text-white py-3 rounded-md hover:bg-blue-600 transition duration-300 transform hover:scale-105">Se connecter</a>
            <a href="{{ route('register') }}" class="block bg-green-500 text-white py-3 rounded-md hover:bg-green-600 transition duration-300 transform hover:scale-105">S'inscrire</a>
        </div>
        <p class="mt-6 text-sm text-gray-500">Votre voix compte !</p>
    </div>

</body>
</html>