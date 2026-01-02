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
        <ul class="navbar-nav ms-auto">
            @auth
                <li class="nav-item">
            <span class="nav-link text-white me-2">
                <strong>Prisijungęs:</strong> {{ Auth::user()->name }} {{ Auth::user()->surname }}
            </span>
                </li>

                <li class="nav-item">
                    <form action="{{ route('logout') }}" method="POST" class="d-inline">
                        @csrf
                        <button type="submit" class="btn btn-outline-info">
                            <i class="bi bi-box-arrow-right"></i> Atsijungti
                        </button>
                    </form>
                </li>

            @endauth
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
