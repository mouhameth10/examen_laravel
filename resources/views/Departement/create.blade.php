<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css" rel="stylesheet">
    <title>Ajouter un Département</title>
</head>
<body>
@include('layouts.navigation')>

    <div class="container mt-4">
        <h1>Ajouter un Département</h1>
        <form action="{{ route('Departement.store') }}" method="POST">
            @csrf
            <div class="form-group">
                <label for="nom">Nom du Département</label>
                <input type="text" class="form-control" name="nom" required placeholder="Entrez le nom du département">
            </div>
            <button type="submit" class="btn btn-success">Créer</button>
            <a href="{{ route('Departement.index') }}" class="btn btn-secondary">Annuler</a>
        </form>
    </div>
</body>
</html>