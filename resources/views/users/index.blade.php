<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
    <style>
        body {
            background-color: #f4f7fa; /* Couleur de fond douce */
        }
        .container {
            background-color: #ffffff; /* Fond blanc pour le conteneur */
            border-radius: 10px; /* Coins arrondis */
            box-shadow: 0 4px 20px rgba(0, 0, 0, 0.1); /* Ombre légère */
            padding: 30px; /* Espacement interne */
            margin-top: 50px; /* Espacement supérieur */
        }
        h1 {
            color: #333; /* Couleur de texte pour le titre */
            font-weight: 600; /* Poids de police */
            text-align: center; /* Centrer le titre */
            margin-bottom: 30px; /* Espacement inférieur */
        }
        .table th {
            background-color: #007bff; /* Couleur de fond des en-têtes */
            color: white; /* Couleur du texte des en-têtes */
        }
        .table tbody tr:hover {
            background-color: #e9ecef; /* Couleur de survol des lignes */
        }
        .btn-primary {
            background-color: #007bff; /* Couleur personnalisée du bouton */
            border-color: #007bff; /* Bordure du bouton */
        }
        .btn-primary:hover {
            background-color: #0056b3; /* Couleur de survol du bouton */
            border-color: #0056b3; /* Bordure de survol du bouton */
        }
        .alert {
            border-radius: 5px; /* Coins arrondis pour les alertes */
        }
        .form-control {
            border-radius: 5px; /* Coins arrondis pour les sélecteurs */
        }
    </style>
</head>
<body>
@include('layouts.navigation')
<div class="container">
    <h1>Gestion des utilisateurs</h1>

    @if(session('success'))
        <div class="alert alert-success alert-dismissible fade show" role="alert">
            {{ session('success') }}
            <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                <span aria-hidden="true">&times;</span>
            </button>
        </div>
    @endif

    <div class="table-responsive">
        <table class="table table-striped table-bordered">
            <thead>
                <tr>
                    <th>Nom</th>
                    <th>Email</th>
                    <th>Rôle</th>
                    <th>Action</th>
                </tr>
            </thead>
            <tbody>
                @foreach($users as $user)
                    <tr>
                        <td>{{ $user->name }}</td>
                        <td>{{ $user->email }}</td>
                        <td>{{ implode(', ', $user->getRoleNames()->toArray()) }}</td>
                        <td>
                            <form action="{{ route('users.updateRole', $user) }}" method="POST" class="d-inline">
                                @csrf
                                <select name="role" class="form-control d-inline" style="width: auto; display: inline;">
                                    <option value="étudiant" {{ $user->hasRole('etudiant') ? 'selected' : '' }}>Étudiant</option>
                                    <option value="admin" {{ $user->hasRole('admin') ? 'selected' : '' }}>Administrateur</option>
                                </select>
                                <button type="submit" class="btn btn-primary btn-sm">Mettre à jour</button>
                            </form>
                        </td>
                    </tr>
                @endforeach
            </tbody>
        </table>
    </div>
</div>

<!-- Ajout de scripts Bootstrap si nécessaire -->
<script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
<script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.9.2/dist/umd/popper.min.js"></script>
<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
</body>
</html>