<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css" rel="stylesheet">
    <title>Modifier un Département</title>
</head>
<body>
@include('layouts.navigation')

    <div class="container mt-4">
        <h1>Modifier un Département</h1>
        <form action="{{ route('Departement.update', $departement->id) }}" method="POST">           
             @csrf
            @method('PUT')
            <div class="form-group">
                <label for="nom">Nom du Département</label>
                <input type="text" class="form-control" name="nom" value="{{ $departement->nom }}" required placeholder="Entrez le nom du département">
            </div>
            <button type="submit" class="btn btn-success">Mettre à Jour</button>
            <a href="{{ route('Departement.index') }}" class="btn btn-secondary">Annuler</a>
        </form>
    </div>
</body>
</html>