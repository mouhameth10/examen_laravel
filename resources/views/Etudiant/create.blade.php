<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css" rel="stylesheet">
    <title>Ajouter un Étudiant</title>
</head>
<body>
@include('layouts.navigation')

    <div class="container mt-4">
        <h1>Ajouter un Étudiant</h1>
        <form action="{{ route('Etudiant.store') }}" method="POST">
            @csrf
            <div class="form-group">
                <label for="nom">Nom</label>
                <input type="text" class="form-control" name="nom" required>
            </div>
            <div class="form-group">
                <label for="prenom">Prénom</label>
                <input type="text" class="form-control" name="prenom" required>
            </div>
            <div class="form-group">
                <label for="matricule">Matricule</label>
                <input type="text" class="form-control" name="matricule" required>
            </div>
            <div class="form-group">
                <label for="departement_id">Département</label>
                <select class="form-control" name="departement_id" required>
                    @foreach($departements as $departement)
                        <option value="{{ $departement->id }}">{{ $departement->nom }}</option>
                    @endforeach
                </select>
            </div>
            <div class="form-group">
                <label for="filiere_id">Filière</label>
                <select class="form-control" name="filiere_id" required>
                    @foreach($filieres as $filiere)
                        <option value="{{ $filiere->id }}">{{ $filiere->nom }}</option>
                    @endforeach
                </select>
            </div>
            <div class="form-group">
                <label for="lieu_naissance">Lieu de Naissance</label>
                <input type="text" class="form-control" name="lieu_naissance">
            </div>
            <button type="submit" class="btn btn-success">Créer</button>
            <a href="{{ route('Etudiant.index') }}" class="btn btn-secondary">Annuler</a>
        </form>
    </div>
</body>
</html>