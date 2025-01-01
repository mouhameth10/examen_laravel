<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css" rel="stylesheet">
    <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.3/css/all.min.css" rel="stylesheet">
    <title>Statistiques des Votes</title>
    <style>
        body {
            background-color: #f8f9fa;
        }
        h1, h2, h3 {
            color: #343a40;
        }
        .card {
            margin-bottom: 20px;
        }
        .table th {
            background-color: #007bff;
            color: white;
        }
        .footer {
            margin-top: 40px;
            text-align: center;
            font-size: 0.9em;
        }
    </style>
</head>
<body>
@include('layouts.navigation')
<div class="container mt-4">
   
    <div class="mb-4">
        <a href="{{ route('votes.export.csv') }}" class="btn btn-success"><i class="fas fa-file-csv"></i> Exporter en CSV</a>
        <a href="{{ route('votes.export.pdf') }}" class="btn btn-danger"><i class="fas fa-file-pdf"></i> Exporter en PDF</a>
    </div>
    <!-- Votre tableau de statistiques ici -->
</div>
    <div class="container mt-4">
        <h1 class="text-center mb-4"><i class="fas fa-chart-bar"></i> Statistiques des Votes</h1>

        <!-- Graphique des Votes par Candidat -->
        <h2 class="mt-4"><i class="fas fa-user-check"></i> Votes par Candidat</h2>
        <canvas id="votesByCandidateChart" width="400" height="200"></canvas>

        @foreach($departements as $departement)
            <div class="card">
                <div class="card-header">
                    <h3>{{ $departement->nom }}</h3>
                </div>
                <div class="card-body">
                    <h4>Filières</h4>
                    <ul class="list-group mb-3">
                        @foreach($departement->filieres as $filiere)
                            <li class="list-group-item">
                                <strong>{{ $filiere->nom }}</strong> : {{ $filiere->candidats->count() }} candidats
                                <ul class="list-group mt-2">
                                    @foreach($filiere->candidats as $candidat)
                                        <li class="list-group-item">
                                            {{ $candidat->etudiant->nom }} ({{ $candidat->etudiant->matricule }}) : {{ $candidat->votes->count() }} votes
                                        </li>
                                    @endforeach
                                </ul>
                            </li>
                        @endforeach
                    </ul>
                </div>
            </div>
        @endforeach

        <div class="footer">
            <p>&copy; {{ date('Y') }} Votre Nom ou Organisation. Tous droits réservés.</p>
        </div>
    </div>

    <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.9.2/dist/umd/popper.min.js"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/chart.js"></script>

    <script>
        const ctx = document.getElementById('votesByCandidateChart').getContext('2d');

        // Données pour le graphique
        const votesData = {
            labels: {!! json_encode($votesParCandidat->pluck('candidat.etudiant.nom')->toArray()) !!},
            datasets: [{
                label: 'Nombre de Votes par Candidat',
                data: {!! json_encode($votesParCandidat->pluck('total')->toArray()) !!},
                backgroundColor: [
                    'rgba(255, 99, 132, 0.5)',
                    'rgba(54, 162, 235, 0.5)',
                    'rgba(255, 206, 86, 0.5)',
                    'rgba(75, 192, 192, 0.5)',
                    'rgba(153, 102, 255, 0.5)',
                    'rgba(255, 159, 64, 0.5)',
                ],
                borderColor: [
                    'rgba(255, 99, 132, 1)',
                    'rgba(54, 162, 235, 1)',
                    'rgba(255, 206, 86, 1)',
                    'rgba(75, 192, 192, 1)',
                    'rgba(153, 102, 255, 1)',
                    'rgba(255, 159, 64, 1)',
                ],
                borderWidth: 1
            }]
        };

        // Création du graphique
        const votesByCandidateChart = new Chart(ctx, {
            type: 'bar',
            data: votesData,
            options: {
                responsive: true,
                scales: {
                    y: {
                        beginAtZero: true,
                        title: {
                            display: true,
                            text: 'Nombre de Votes'
                        }
                    },
                    x: {
                        title: {
                            display: true,
                            text: 'Candidats'
                        }
                    }
                }
            }
        });
    </script>
</body>
</html>