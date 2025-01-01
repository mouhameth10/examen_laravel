<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css" rel="stylesheet">
    <title>Détails du Vote</title>
</head>
<body>
@include('layouts.navigation')
    <div class="container mt-4">
        <h1>Détails du Vote</h1>
        <p><strong>ID :</strong> {{ $vote->id }}</p>
        <p><strong>Candidat :</strong> {{ $vote->candidat->etudiant->nom }} ({{ $vote->candidat->etudiant->matricule }})</p>
        <p><strong>Étudiant :</strong> {{ $vote->etudiant->nom }}</p>
        <a href="{{ route('Vote.index') }}" class="btn btn-secondary">Retour à la liste</a>
        @if(auth()->user()->hasRole('admin'))
                <a href="{{ route('Vote.edit', $vote) }}" class="btn btn-warning">Modifier</a>  
                      @endif
    </div>
</body>
</html>