<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css" rel="stylesheet">
    <title>Liste des Étudiants</title>
    <style>
        body {
            background-color: #f8f9fa; /* Couleur de fond légère */
        }
        .navbar {
            margin-bottom: 20px; /* Espacement sous la barre de navigation */
        }
        .table th, .table td {
            vertical-align: middle; /* Alignement vertical centré */
        }
        .btn {
            margin-right: 5px; /* Espacement entre les boutons */
        }
    </style>
</head>
<body>
@include('layouts.navigation')

    <div class="container mt-4">
        <h1>Liste des Étudiants</h1>
        <form method="GET" action="{{ route('Etudiant.index') }}" class="mb-3">
            <input type="text" name="search" class="form-control" placeholder="Rechercher un étudiant...">
        </form>
        @if(auth()->user()->hasRole('admin'))
            <a href="{{ route('Etudiant.create') }}" class="btn btn-primary mb-3">Ajouter un Étudiant</a>
        @endif
        <table class="table table-bordered table-striped">
            <thead class="thead-light">
                <tr>
                    <th>Nom</th>
                    <th>Prénom</th>
                    <th>Matricule</th>
                    <th>Département</th>
                    <th>Filière</th>
                    <th>Actions</th>
                </tr>
            </thead>
            <tbody>
                @foreach($etudiants as $etudiant)
                    <tr>
                        <td>{{ $etudiant->nom }}</td>
                        <td>{{ $etudiant->prenom }}</td>
                        <td>{{ $etudiant->matricule }}</td>
                        <td>{{ $etudiant->departement->nom }}</td>
                        <td>{{ $etudiant->filiere->nom }}</td>
                        <td>
                            <a href="{{ route('Etudiant.show', $etudiant) }}" class="btn btn-info">Voir</a>
                            @if(auth()->user()->hasRole('admin'))
                                <a href="{{ route('Etudiant.edit', $etudiant) }}" class="btn btn-warning">Modifier</a>
                                <form action="{{ route('Etudiant.destroy', $etudiant) }}" method="POST" style="display:inline;">
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