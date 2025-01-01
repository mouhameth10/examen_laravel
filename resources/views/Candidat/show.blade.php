<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css" rel="stylesheet">
    <title>Détails du Candidat</title>
</head>
<body>
@include('layouts.navigation')

    <div class="container mt-4">
        <h1>Détails du Candidat</h1>
        <div class="card">
            <div class="card-body">
                <h5 class="card-title">{{ $candidat->etudiant->nom }} {{ $candidat->etudiant->prenom }}</h5>
                <p class="card-text">ID Étudiant: {{ $candidat->etudiant_id }}</p>
                <p class="card-text">Programme: {{ $candidat->programme }}</p>
                <a href="{{ route('Candidat.index') }}" class="btn btn-primary">Retour à la Liste</a>
                @if(auth()->user()->hasRole('admin'))
                <a href="{{ route('Candidat.edit', $candidat) }}" class="btn btn-warning">Modifier</a>  
                      @endif
            </div>
        </div>
    </div>
</body>
</html>