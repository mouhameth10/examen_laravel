<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css" rel="stylesheet">
    <title>Détails de la Filière</title>
</head>
<body>
@include('layouts.navigation')
    <div class="container mt-4">
        <h1>Détails de la Filière</h1>
        <p><strong>ID :</strong> {{ $filiere->id }}</p>
        <p><strong>Nom :</strong> {{ $filiere->nom }}</p>
        <p><strong>Description :</strong> {{ $filiere->description }}</p>
        <p><strong>Département :</strong> {{ $filiere->departement->nom }}</p>
        <a href="{{ route('Filiere.index') }}" class="btn btn-secondary">Retour à la liste</a>
        @if(auth()->user()->hasRole('admin'))
                <a href="{{ route('Filiere.edit', $filiere) }}" class="btn btn-warning">Modifier</a>  
                      @endif
    </div>
</body>
</html>