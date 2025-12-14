<!DOCTYPE html>
<html lang="lt">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>@yield('title')</title>

    @vite(['resources/css/app.css', 'resources/js/app.js'])
</head>
<body>
{{-- Navbar --}}
<nav class="navbar navbar-expand-lg navbar-dark bg-dark">
    <div class="container">
        <a class="navbar-brand" href="{{ route('home') }}">
            {{ __('messages.project_title') }}
        </a>
        <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav" aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
        </button>
        <div class="collapse navbar-collapse" id="navbarNav">
            <ul class="navbar-nav ms-auto">
                {{-- link to client module --}}
                <li class="nav-item">
                    <a class="nav-link" href="#">Klientas</a>
                </li>
                {{-- link to employee module --}}
                <li class="nav-item">
                    <a class="nav-link" href="#">Darbuotojas</a>
                </li>
                {{-- link to admin module --}}
                <li class="nav-item">
                    <a class="nav-link" href="#">Administratorius</a>
                </li>
            </ul>
        </div>
    </div>
</nav>

{{-- content container --}}
<main class="py-4">
    <div class="container">
        @yield('content')
    </div>
</main>
</body>
</html>
