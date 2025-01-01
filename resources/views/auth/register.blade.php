<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no" />
    <meta http-equiv="x-ua-compatible" content="ie=edge" />
    <title>Inscription</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-rbsA2VBKQhggwzxH7pPCaAqO46MgnOM80zW1RWuH61DGLwZJEdK2Kadq2F9CUG65" crossorigin="anonymous">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-kenU1KFdBIe4zVF0s0G1M5b4hcpxyD9F7jL+jjXkk+Q2h455rYXK/7HAuoJl+0I4" crossorigin="anonymous"></script>
    <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.11.2/css/all.css" />
    <link rel="stylesheet" href="https://fonts.googleapis.com/css2?family=Roboto:wght@300;400;500;700&display=swap" />
    <style>
        body {
            background-color: #eaf4f4;
            font-family: 'Roboto', sans-serif;
        }
        .card {
            box-shadow: 0 0 20px rgba(0, 0, 0, 0.1);
        }
        .form-control {
            border-radius: 0.375rem;
            box-shadow: 0 0 5px rgba(0, 0, 0, 0.1);
        }
        .btn-primary {
            background-color: #004d4d;
            border: none;
        }
        .btn-primary:hover {
            background-color: #003c3c;
        }
        .form-container {
            background: white;
            padding: 30px;
            border-radius: 10px;
            box-shadow: 0 4px 12px rgba(0, 0, 0, 0.1);
        }
        .container {
            margin-top: 100px;
        }
        .form-label {
            color: #004d4d;
        }
        h2 {
            color: #004d4d;
        }
    </style>
</head>

<body>
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-xl-5 col-md-8">
                <div class="card form-container">
                    <div class="card-body">
                        <h2 class="text-center mb-4">Créer un Compte</h2>

                        <form method="POST" action="{{ route('register') }}">
                            @csrf

                            <!-- Name -->
                            <div class="form-outline mb-4">
                                <label for="name" class="form-label">Nom</label>
                                <input id="name" class="form-control" type="text" name="name" value="{{ old('name') }}" required autofocus />
                            </div>

                            <!-- Email Address -->
                            <div class="form-outline mb-4">
                                <label for="email" class="form-label">Email</label>
                                <input id="email" class="form-control" type="email" name="email" value="{{ old('email') }}" required />
                            </div>

                            <!-- Password -->
                            <div class="form-outline mb-4">
                                <label for="password" class="form-label">Mot de passe</label>
                                <input id="password" class="form-control" type="password" name="password" required autocomplete="new-password" />
                            </div>

                            <!-- Confirm Password -->
                            <div class="form-outline mb-4">
                                <label for="password_confirmation" class="form-label">Confirmer le mot de passe</label>
                                <input id="password_confirmation" class="form-control" type="password" name="password_confirmation" required />
                            </div>

                            <!-- Submit Button -->
                            <div class="d-flex justify-content-between align-items-center">
                                <a class="text-decoration-none text-primary" href="{{ route('login') }}">
                                    Déjà inscrit ?
                                </a>
                                <button type="submit" class="btn btn-primary">S'inscrire</button>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <script type="text/javascript" src="js/mdb.min.js"></script>
    <script type="text/javascript" src="js/script.js"></script>
</body>
</html>