<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <title>Laravel/VueJS3</title>
    @vite('resources/css/app.css')
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-4bw+/aepP/YC94hEpVNVgiZdgIC5+VKNBQNGCHeKRQN+PtmoHDEXuppvnDJzQIu9" crossorigin="anonymous">
</head>
<body>
<main class="form-signin">
    @if (Route::has('login'))
        <div class="form-floating">
            @auth
                <a href="{{ route('dashboard') }}" class="btn button-dashboard">Dashboard</a>
            @else
                <a href="{{ route('login') }}" class="btn btn-success" style="margin: 15px; ">Log in</a>
                 @if (Route::has('register'))
                    <a href="{{ route('register') }}" class="btn btn-outline-primary">Register</a>
                @endif
            @endauth
        </div>
    @endif
</main>
<main id="app">
</main>
@vite('resources/js/app.js')
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.1/dist/js/bootstrap.bundle.min.js" integrity="sha384-HwwvtgBNo3bZJJLYd8oVXjrBZt8cqVSpeBNS5n7C8IVInixGAoxmnlMuBnhbgrkm" crossorigin="anonymous"></script>
</body>
</html>
