<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css" rel="stylesheet">
    <title>Modifier un Candidat</title>
</head>
<body>
@include('layouts.navigation')
    <div class="container mt-4">
        <h1>Modifier un Candidat</h1>
        <form action="{{ route('Candidat.update', $candidat) }}" method="POST">
            @csrf
            @method('PUT')
            <div class="form-group">
                <label for="etudiant_id">Étudiant</label>
                <select class="form-control" name="etudiant_id" required>
                    @foreach($etudiants as $etudiant)
                        <option value="{{ $etudiant->id }}" {{ $candidat->etudiant_id == $etudiant->id ? 'selected' : '' }}>{{ $etudiant->nom }} {{ $etudiant->prenom }}</option>
                    @endforeach
                </select>
            </div>
            <div class="form-group">
                <label for="programme">Programme</label>
                <input type="text" class="form-control" name="programme" value="{{ $candidat->programme }}" required placeholder="Entrez le programme">
            </div>
            <button type="submit" class="btn btn-success">Mettre à Jour</button>
            <a href="{{ route('Candidat.index') }}" class="btn btn-secondary">Annuler</a>
        </form>
    </div>
</body>
</html>