<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css" rel="stylesheet">
    <title>Créer un Vote</title>
</head>
<body>
@include('layouts.navigation')
    <div class="container mt-4">
        <h1>Créer un Vote</h1>
        @if(session('error'))
            <div class="alert alert-danger">{{ session('error') }}</div>
        @endif
        <form method="POST" action="{{ route('Vote.store') }}">
            @csrf
            <div class="form-group">

                <label for="candidat_id">Candidat :</label>
                <select name="candidat_id" class="form-control" id="candidat_id" required>
                    @if($candidats->isEmpty())
                        <option value="">Aucun candidat disponible</option>
                    @else
                        @foreach($candidats as $candidat)
                            <option value="{{ $candidat->id }}">{{ $candidat->etudiant->nom }} ({{ $candidat->etudiant->matricule }})</option>
                        @endforeach
                    @endif
                </select>
            </div>
            <div class="form-group">
                <label for="etudiant_id">Étudiant :</label>
                <select name="etudiant_id" class="form-control" id="etudiant_id" required>
                    @foreach($etudiants as $etudiant)
                        <option value="{{ $etudiant->id }}">{{ $etudiant->matricule }}</option>
                    @endforeach
                </select>
            </div>
            <button type="submit" class="btn btn-primary">Créer</button>
            <a href="{{ route('Vote.index') }}" class="btn btn-secondary">Annuler</a>
        </form>
    </div>
</body>
</html>