<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css" rel="stylesheet">
    <title>Modifier une Filière</title>
</head>
<body>
@include('layouts.navigation')
    <div class="container mt-4">
        <h1>Modifier une Filière</h1>
        <form method="POST" action="{{ route('Filiere.update', $filiere) }}">
            @csrf
            @method('PUT')
            <div class="form-group">
                <label for="nom">Nom de la Filière :</label>
                <input type="text" name="nom" class="form-control" id="nom" value="{{ $filiere->nom }}" required>
            </div>
            <div class="form-group">
                <label for="description">Description :</label>
                <textarea name="description" class="form-control" id="description" required>{{ $filiere->description }}</textarea>
            </div>
            <div class="form-group">
                <label for="departement_id">Département :</label>
                <select name="departement_id" class="form-control" id="departement_id" required>
                    @foreach($departements as $departement)
                        <option value="{{ $departement->id }}" {{ $departement->id == $filiere->departement_id ? 'selected' : '' }}>
                            {{ $departement->nom }}
                        </option>
                    @endforeach
                </select>
            </div>
            <button type="submit" class="btn btn-primary">Mettre à jour</button>
            <a href="{{ route('Filiere.index') }}" class="btn btn-secondary">Annuler</a>
        </form>
    </div>
</body>
</html>