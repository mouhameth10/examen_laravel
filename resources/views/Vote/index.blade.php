<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css" rel="stylesheet">
    <title>Liste des Votes</title>
</head>
<body>
@include('layouts.navigation')

<div class="container mt-4">
    <h1>Liste des Votes</h1>
 
        <a href="{{ route('Vote.create') }}" class="btn btn-primary mb-3">Voter</a>
        <a href="{{ route('Vote.statistics') }}" class="btn btn-secondary mb-3">Voir les Statistiques</a>
   
    <table class="table table-bordered table-striped">
        <thead class="thead-light">
            <tr>
                <th>ID</th>
                <th>Candidat choisi</th>
                <th>Étudiant</th>
                <th>Actions</th>
            </tr>
        </thead>
        <tbody>
            @foreach($votes as $vote)
                <tr>
                    <td>{{ $vote->id }}</td>
                    <td>{{ $vote->candidat->etudiant->nom }} ({{ $vote->candidat->etudiant->matricule }})</td>
                    <td>{{ $vote->etudiant->nom }}</td>
                    <td>
                        <a href="{{ route('Vote.show', $vote) }}" class="btn btn-info">Voir</a>
                        @if(auth()->user()->hasRole('admin'))
                            <a href="{{ route('Vote.edit', $vote) }}" class="btn btn-warning">Modifier</a>
                            <form action="{{ route('Vote.destroy', $vote) }}" method="POST" style="display:inline;">
                                @csrf
                                @method('DELETE')
                                <button type="submit" class="btn btn-danger">Supprimer</button>
                            </form>
                        @endif
                    </td>
                </tr>
            @endforeach
        </tbody>
    </table>
</div>

<!-- Ajout de scripts Bootstrap si nécessaire -->
<script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
<script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.9.2/dist/umd/popper.min.js"></script>
<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
</body>
</html>