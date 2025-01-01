<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css" rel="stylesheet">
    <title>Modifier un Vote</title>
</head>
<body>
@include('layouts.navigation')
    <div class="container mt-4">
        <h1>Modifier un Vote</h1>
        <form method="POST" action="{{ route('Vote.update', $vote) }}">
            @csrf
            @method('PUT')
            <div class="form-group">
                <label for="candidat_id">Candidat :</label>
                <select name="candidat_id" class="form-control" id="candidat_id" required>
                    @foreach($candidats as $candidat)
                        <option value="{{ $candidat->id }}" {{ $candidat->id == $vote->candidat_id ? 'selected' : '' }}>
                        {{ $candidat->etudiant->nom }} ({{ $candidat->etudiant->matricule }})
                        </option>
                    @endforeach
                </select>
            </div>
            <div class="form-group">
                <label for="etudiant_id">Étudiant :</label>
                <select name="etudiant_id" class="form-control" id="etudiant_id" required>
                    @foreach($etudiants as $etudiant)
                        <option value="{{ $etudiant->id }}" {{ $etudiant->id == $vote->etudiant_id ? 'selected' : '' }}>
                            {{ $etudiant->nom }}
                        </option>
                    @endforeach
                </select>
            </div>
            <button type="submit" class="btn btn-primary">Mettre à jour</button>
            <a href="{{ route('Vote.index') }}" class="btn btn-secondary">Annuler</a>
        </form>
    </div>
</body>
</html>