<!DOCTYPE html>
<html lang="fr">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Authentification</title>
    {{-- Bootstrap CSS --}}
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet">
    <link href="{{ asset('css/custom.css') }}" rel="stylesheet">
    <link rel="icon" type="image/png" href="/favicon-96x96.png" sizes="96x96" />
    <link rel="icon" type="image/svg+xml" href="/favicon.svg" />
    <link rel="shortcut icon" href="/favicon.ico" />
    <link rel="apple-touch-icon" sizes="180x180" href="/apple-touch-icon.png" />
    <link rel="manifest" href="/site.webmanifest" />

</head>

<body class="bg-light d-flex align-items-center justify-content-center vh-100">

    <div class="card shadow-lg p-4" style="max-width: 400px; width: 100%;">
        <div class="text-center mb-4">
            <img src="{{ asset('images/logo.svg') }}" alt="Logo" width="100">
        </div>

        <h2 class="text-center mb-4">Connexion</h2>

        @if (session('success_msg'))
            <div class="alert alert-success">
                {{ session('success_msg') }}
            </div>
        @endif
        @if (session('error_msg'))
            <div class="alert alert-danger">
                {{ session('error_msg') }}
            </div>
        @endif


        <form action="{{ route('handlelogin') }}" method="POST">
            @csrf
            @method('POST')
            {{-- Email --}}
            <div class="mb-3">
                <label for="email" class="form-label">Adresse Email</label>
                <input type="email" id="email" name="email" class="form-control" placeholder="adresse@gmail.com"
                    required>
                @error('email')
                    <div class="text-danger small">{{ $message }}</div>
                @enderror
            </div>

            {{-- Mot de passe --}}
            <div class="mb-3">
                <label for="password" class="form-label">Mot de passe</label>
                <input type="password" id="password" name="password" class="form-control" placeholder="••••••••"
                    required>
                @error('password')
                    <div class="text-danger small">{{ $message }}</div>
                @enderror
            </div>



            {{-- Bouton --}}
            <button type="submit" class="btn btn-primary w-100">Se connecter</button>
            <div class="d-flex justify-content-between align-items-center mb-3">

                <a href="#" class="link-custom">Mot de passe oublié ?</a>

            </div>
        </form>

        <p class="text-center mt-3 mb-0">
            Pas encore de compte ? <a href="#" class="link-custom">S’inscrire</a>
        </p>
    </div>

    {{-- Bootstrap JS --}}
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js"></script>
</body>

</html>
