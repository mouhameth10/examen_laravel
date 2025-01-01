<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Navigation</title>
    <!-- Ajouter le CSS de Bootstrap -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/css/bootstrap.min.css" rel="stylesheet" />
    <!-- Ajouter Bootstrap Icons -->
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.5.0/font/bootstrap-icons.css" />
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
        .notification-icon {
            margin-left: 20px; /* Décalage de l'icône de notification */
        }
        .settings-dropdown {
            margin-left: 30px; /* Décalage du menu déroulant */
        }
    </style>
</head>
<body>

<nav class="navbar navbar-expand-lg navbar-light bg-light border-bottom align-items-center">
    <div class="container-fluid">
        <!-- Branding sans marge -->
        <a class="navbar-brand" href="{{ url('dashboard') }}">Système de Gestion</a>

        <!-- Hamburger Toggle (Mobile) -->
        <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav" aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
        </button>

        <!-- Navigation Links -->
        <div class="collapse navbar-collapse" id="navbarNav">
            <ul class="navbar-nav me-auto mb-2 mb-lg-0">
                <li class="nav-item">
                    <a class="nav-link" href="{{ url('Etudiant') }}">Étudiants</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="{{ url('Candidat') }}">Candidats</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="{{ url('Vote') }}">Votes</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="{{ url('Filiere') }}">Filières</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="{{ url('Departement') }}">Départements</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="{{ url('statistics') }}">Statistics</a>
                </li>
                @if(auth()->user()->hasRole('admin'))
                <li class="nav-item">
                    <a class="nav-link" href="{{ url('users') }}">Utilisateurs</a>
                </li>
                @endif
            </ul>

            <!-- Notification Icon -->
            <a href="{{ url('updates') }}" class="btn btn-outline-primary position-relative notification-icon">
                <i class="bi bi-bell"></i>
                @php
                    $notificationCount = auth()->user()->updates()->where('read', false)->count();
                @endphp
                @if($notificationCount > 0)
                    <span class="position-absolute top-0 start-100 translate-middle badge rounded-pill bg-danger">
                        {{ $notificationCount }}
                        <span class="visually-hidden">Notifications non lues</span>
                    </span>
                @endif
            </a>

            <!-- Settings Dropdown -->
            <div class="dropdown settings-dropdown">
                <button class="btn btn-secondary dropdown-toggle" type="button" id="settingsDropdown" data-bs-toggle="dropdown" aria-expanded="false">
                    {{ Auth::user()->name }}
                </button>
                <ul class="dropdown-menu dropdown-menu-end" aria-labelledby="settingsDropdown">
                    <li><a class="dropdown-item" href="{{ route('profile.edit') }}">{{ __('Profile') }}</a></li>
                    <li>
                        <form method="POST" action="{{ route('logout') }}">
                            @csrf
                            <button type="submit" class="dropdown-item" onclick="event.preventDefault(); this.closest('form').submit();">
                                {{ __('Log Out') }}
                            </button>
                        </form>
                    </li>
                </ul>
            </div>
        </div>
    </div>
</nav>

<!-- Ajouter le JavaScript de Bootstrap -->
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/js/bootstrap.bundle.min.js"></script>

</body>
</html>