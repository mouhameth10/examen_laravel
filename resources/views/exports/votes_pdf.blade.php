<!DOCTYPE html>
<html>
<head>
    <title>Votes PDF</title>
    <style>
        body {
            font-family: Arial, sans-serif;
        }
        table {
            width: 100%;
            border-collapse: collapse;
        }
        th, td {
            border: 1px solid #000;
            padding: 8px;
            text-align: left;
        }
        th {
            background-color: #007bff;
            color: white;
        }
    </style>
</head>
<body>
    <h1>Statistiques des Votes</h1>
    <table>
        <thead>
            <tr>
                <th>Candidat</th>
                <th>Nombre de Votes</th>
            </tr>
        </thead>
        <tbody>
            @foreach ($candidats as $candidat)
                <tr>
                    <td>{{ $candidat->etudiant->matricule }} : {{ $candidat->etudiant->nom }} {{ $candidat->etudiant->prenom }}</td> <!-- Nom de l'étudiant -->
                    <td>{{ $candidat->votes_count }}</td> <!-- Nombre de votes -->
                </tr>
            @endforeach
        </tbody>
    </table>
</body>
</html>