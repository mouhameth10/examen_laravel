<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css" rel="stylesheet">
    <title>Mises à Jour</title>
    <style>
        body {
            background-color: #f8f9fa;
        }
        .container {
            margin-top: 20px;
            padding: 20px;
            background-color: white;
            border-radius: 8px;
            box-shadow: 0 2px 10px rgba(0, 0, 0, 0.1);
        }
        h1 {
            margin-bottom: 20px;
        }
        .update-item {
            border: 1px solid #e9ecef;
            border-radius: 5px;
            padding: 15px;
            margin-bottom: 15px;
            transition: transform 0.2s;
        }
        .update-item:hover {
            transform: scale(1.02);
        }
    </style>
</head>
<body>
@include('layouts.navigation')

<div class="container">
    <h1 class="text-center">Mises à Jour</h1>

    @if(session('success'))
        <div class="alert alert-success">
            {{ session('success') }}
        </div>
    @endif

    <div class="text-right mb-3">
    @if(auth()->user()->hasRole('admin'))
        <a href="{{ route('updates.create') }}" class="btn btn-primary">Ajouter une Mise à Jour</a>
        @endif
    </div>

    <ul class="list-unstyled">
        @foreach($updates as $update)
            <li class="update-item">
                <strong class="text-primary">{{ $update->title }}</strong><br>
                <p>{{ $update->description }}</p>
                <small class="text-muted">{{ $update->created_at->format('d/m/Y H:i') }}</small>
            </li>
        @endforeach
    </ul>
</div>

<script src="https://code.jquery.com/jquery-3.5.1.slim.min.js"></script>
<script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.5.3/dist/umd/popper.min.js"></script>
<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
</body>
</html>