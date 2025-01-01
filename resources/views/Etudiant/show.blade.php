<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css" rel="stylesheet">
    <title>Détails de l'Étudiant</title>
</head>
<body>
@include('layouts.navigation')

    <div class="container mt-4">
        <h1>Détails de l'Étudiant</h1>
        <div class="card">
            <div class="card-body">
                <h5 class="card-title">{{ $etudiant->nom }} {{ $etudiant->prenom }}</h5>
                <p class="card-text">Matricule: {{ $etudiant->matricule }}</p>
                <p class="card-text">Département: {{ $etudiant->departement->nom }}</p>
                <p class="card-text">Filière: {{ $etudiant->filiere->nom }}</p>
                <p class="card-text">Lieu de Naissance: {{ $etudiant->lieu_naissance }}</p>
                <a href="{{ route('Etudiant.index') }}" class="btn btn-primary">Retour à la Liste</a>
                @if(auth()->user()->hasRole('admin'))
                <a href="{{ route('Etudiant.edit', $etudiant) }}" class="btn btn-warning">Modifier</a>  
                      @endif            </div>
        </div>
    </div>
</body>
</html>