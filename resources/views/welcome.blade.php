<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <title>Laravel/VueJS3</title>
    @vite('resources/css/app.css')
</head>
<body>
<main class="form-signin">
    @if (Route::has('login'))
        <div class="form-floating">
            @auth
                <a href="{{ route('dashboard') }}" class="btn button-dashboard">Dashboard</a>
            @else
                <a href="{{ route('login') }}" class="button-login btn" style="margin: 15px; padding: 15px">Log in</a>
                 @if (Route::has('register'))
                    <a href="{{ route('register') }}" class="button btn btn-primary btn-lg">Register</a>
                @endif
            @endauth
        </div>
    @endif
</main>
<main id="app">
</main>
@vite('resources/js/app.js')
</body>
</html>
