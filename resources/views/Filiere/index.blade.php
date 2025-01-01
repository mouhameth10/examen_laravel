<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css" rel="stylesheet">
    <title>Liste des Filières</title>
</head>
<body>
@include('layouts.navigation')

<div class="container mt-4">
    <h1>Liste des Filières</h1>
    <form method="GET" action="{{ route('Filiere.index') }}" class="mb-3">
        <input type="text" name="search" class="form-control" placeholder="Rechercher une filière...">
    </form>
    @if(auth()->user()->hasRole('admin'))
        <a href="{{ route('Filiere.create') }}" class="btn btn-primary mb-3">Ajouter une Filière</a>
    @endif
    <table class="table table-bordered table-striped">
        <thead class="thead-light">
            <tr>
                <th>ID</th>
                <th>Nom</th>
                <th>Description</th>
                <th>Département</th>
                <th>Actions</th>
            </tr>
        </thead>
        <tbody>
            @foreach($filieres as $filiere)
                <tr>
                    <td>{{ $filiere->id }}</td>
                    <td>{{ $filiere->nom }}</td>
                    <td>{{ $filiere->description }}</td>
                    <td>{{ $filiere->departement->nom }}</td>
                    <td>
                        <a href="{{ route('Filiere.show', $filiere) }}" class="btn btn-info">Voir</a>
                        @if(auth()->user()->hasRole('admin'))
                            <a href="{{ route('Filiere.edit', $filiere) }}" class="btn btn-warning">Modifier</a>
                            <form action="{{ route('Filiere.destroy', $filiere) }}" method="POST" style="display:inline;">
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