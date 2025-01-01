<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css" rel="stylesheet">
    <title>Liste des Candidats</title>
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
        .search-form {
            display: flex; /* Flexbox pour aligner le champ de recherche */
            justify-content: space-between; /* Espace entre le champ et le bouton */
        }
    </style>
</head>
<body>
@include('layouts.navigation')

<div class="container mt-4">
    <h1>Liste des Candidats</h1>
    <form method="GET" action="{{ route('Candidat.index') }}" class="mb-3 search-form">
        <input type="text" name="search" class="form-control" placeholder="Rechercher un candidat..." aria-label="Recherche">
        <button type="submit" class="btn btn-primary">Rechercher</button>
    </form>
    @if(auth()->user()->hasRole('admin'))
        <a href="{{ route('Candidat.create') }}" class="btn btn-primary mb-3">Ajouter un Candidat</a>
    @endif
    <table class="table table-bordered table-striped">
        <thead class="thead-light">
            <tr>
                <th>Nom</th>
                <th>Prénom</th>
                <th>Programme</th>
                <th>Actions</th>
            </tr>
        </thead>
        <tbody>
            @foreach($candidats as $candidat)
                <tr>
                    <td>{{ $candidat->etudiant->nom }}</td>
                    <td>{{ $candidat->etudiant->prenom }}</td>
                    <td>{{ $candidat->programme }}</td>
                    <td>
                        <a href="{{ route('Candidat.show', $candidat) }}" class="btn btn-info">Voir</a>
                        @if(auth()->user()->hasRole('admin'))
                            <a href="{{ route('Candidat.edit', $candidat) }}" class="btn btn-warning">Modifier</a>
                            <form action="{{ route('Candidat.destroy', $candidat) }}" method="POST" style="display:inline;">
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