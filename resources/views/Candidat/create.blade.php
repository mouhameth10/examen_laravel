<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css" rel="stylesheet">
    <title>Ajouter un Candidat</title>
</head>
<body>
@include('layouts.navigation')

    <div class="container mt-4">
        <h1>Ajouter un Candidat</h1>
        <form action="{{ route('Candidat.store') }}" method="POST">
            @csrf
            <div class="form-group">
                <label for="etudiant_id">Étudiant</label>
                <select class="form-control" name="etudiant_id" required>
                    @foreach($etudiants as $etudiant)
                        <option value="{{ $etudiant->id }}">{{ $etudiant->nom }} {{ $etudiant->prenom }}</option>
                    @endforeach
                </select>
            </div>
            <div class="form-group">
                <label for="programme">Programme</label>
                <input type="text" class="form-control" name="programme" required placeholder="Entrez le programme">
            </div>
            <button type="submit" class="btn btn-success">Créer</button>
            <a href="{{ route('Candidat.index') }}" class="btn btn-secondary">Annuler</a>
        </form>
    </div>
</body>
</html>