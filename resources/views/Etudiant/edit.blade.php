<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css" rel="stylesheet">
    <title>Modifier un Étudiant</title>
</head>
<body>
@include('layouts.navigation')

    <div class="container mt-4">
        <h1>Modifier un Étudiant</h1>
        <form action="{{ route('Etudiant.update', $etudiant) }}" method="POST">
            @csrf
            @method('PUT')
            <div class="form-group">
                <label for="nom">Nom</label>
                <input type="text" class="form-control" name="nom" value="{{ $etudiant->nom }}" required>
            </div>
            <div class="form-group">
                <label for="prenom">Prénom</label>
                <input type="text" class="form-control" name="prenom" value="{{ $etudiant->prenom }}" required>
            </div>
            <div class="form-group">
                <label for="matricule">Matricule</label>
                <input type="text" class="form-control" name="matricule" value="{{ $etudiant->matricule }}" required>
            </div>
            <div class="form-group">
                <label for="departement_id">Département</label>
                <select class="form-control" name="departement_id" required>
                    @foreach($departements as $departement)
                        <option value="{{ $departement->id }}" {{ $etudiant->departement_id == $departement->id ? 'selected' : '' }}>{{ $departement->nom }}</option>
                    @endforeach
                </select>
            </div>
            <div class="form-group">
                <label for="filiere_id">Filière</label>
                <select class="form-control" name="filiere_id" required>
                    @foreach($filieres as $filiere)
                        <option value="{{ $filiere->id }}" {{ $etudiant->filiere_id == $filiere->id ? 'selected' : '' }}>{{ $filiere->nom }}</option>
                    @endforeach
                </select>
            </div>
            <div class="form-group">
                <label for="lieu_naissance">Lieu de Naissance</label>
                <input type="text" class="form-control" name="lieu_naissance" value="{{ $etudiant->lieu_naissance }}">
            </div>
            <button type="submit" class="btn btn-success">Mettre à Jour</button>
            <a href="{{ route('Etudiant.index') }}" class="btn btn-secondary">Annuler</a>
        </form>
    </div>
</body>
</html>