<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>{{ config('app.name', 'Laravel') }}</title>

    <!-- Fonts -->
    <link rel="preconnect" href="https://fonts.bunny.net">
    <link href="https://fonts.bunny.net/css?family=figtree:400,500,600&display=swap" rel="stylesheet" />

    <!-- Tailwind CSS -->
    <link href="https://cdn.jsdelivr.net/npm/tailwindcss@2.2.19/dist/tailwind.min.css" rel="stylesheet">

    <!-- Custom Styles -->
    <style>
        body {
            background-color: #f8fafc; /* Couleur de fond douce */
        }
        .section-title {
            border-bottom: 2px solid #4f46e5; /* Ligne sous le titre */
            padding-bottom: 0.5rem; /* Espacement sous le titre */
            margin-bottom: 1rem; /* Espacement au-dessus du titre */
            color: #4f46e5; /* Couleur du titre */
        }
        .shadow-custom {
            box-shadow: 0 4px 20px rgba(0, 0, 0, 0.1); /* Ombre personnalisée */
        }
    </style>
</head>
<body class="font-sans antialiased">
    <div class="min-h-screen bg-gray-100 dark:bg-gray-900">
        @include('layouts.navigation')

        <!-- Page Content -->
        <main class="p-6">
            <div class="max-w-7xl mx-auto">
                <h1 class="text-4xl font-bold mb-6 text-gray-800 dark:text-gray-200 text-center">Élection du Bureau de l'Amicale des Étudiants</h1>

                <section class="mb-8 p-6 bg-white dark:bg-gray-800 rounded-lg shadow-custom">
                    <h2 class="text-2xl font-semibold section-title">Étudiants</h2>
                    <p class="text-gray-600 dark:text-gray-400">
                        L'élection du bureau de l'amicale des étudiants est un événement crucial qui permet aux étudiants de choisir leurs représentants. Ces représentants joueront un rôle important en faisant le lien entre l'administration et les étudiants, en organisant des événements et en défendant les intérêts des étudiants.
                    </p>
                </section>

                <section class="mb-8 p-6 bg-white dark:bg-gray-800 rounded-lg shadow-custom">
                    <h2 class="text-2xl font-semibold section-title">Filières</h2>
                    <p class="text-gray-600 dark:text-gray-400">
                        Chaque filière a des représentants qui s'assurent que les voix des étudiants de leur domaine sont entendues. Ils travaillent en collaboration avec le bureau de l'amicale pour garantir que les préoccupations spécifiques à chaque filière sont prises en compte.
                    </p>
                </section>

                <section class="mb-8 p-6 bg-white dark:bg-gray-800 rounded-lg shadow-custom">
                    <h2 class="text-2xl font-semibold section-title">Départements</h2>
                    <p class="text-gray-600 dark:text-gray-400">
                        Les départements jouent un rôle clé dans l'organisation des élections. Ils sont responsables de la mise en place de la logistique nécessaire pour assurer un processus électoral équitable et transparent.
                    </p>
                </section>

                <section class="mb-8 p-6 bg-white dark:bg-gray-800 rounded-lg shadow-custom">
                    <h2 class="text-2xl font-semibold section-title">Candidats</h2>
                    <p class="text-gray-600 dark:text-gray-400">
                        Les candidats au bureau de l'amicale des étudiants sont choisis par leurs pairs. Chaque candidat présente son programme et ses idées pour améliorer la vie étudiante. Les étudiants sont encouragés à voter et à faire entendre leur voix pour élire les représentants qui les représenteront au mieux.
                    </p>
                </section>

                <section class="mb-8 p-6 bg-white dark:bg-gray-800 rounded-lg shadow-custom">
                    <h2 class="text-2xl font-semibold section-title">Informations Pratiques</h2>
                    <ul class="list-disc pl-5 text-gray-600 dark:text-gray-400">
                        <li>Date des élections : <strong>[Insérer la date]</strong></li>
                        <li>Lieu : <strong>[Insérer le lieu]</strong></li>
                        <li>Comment voter : <strong>[Insérer des instructions sur le vote]</strong></li>
                    </ul>
                </section>
            </div>
        </main>
    </div>
</body>
</html>