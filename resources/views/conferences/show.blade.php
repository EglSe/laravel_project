<!DOCTYPE html>
<html>
<head>
    <title>Konferencijos informacija</title>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css">
</head>
<body class="container mt-5">
<div class="card">
    <div class="card-header">
        <h1>{{ $conference->title }}</h1>
    </div>
    <div class="card-body">
        <p><strong>Lektorius:</strong> {{ $conference->lecturer }}</p>
        <p><strong>Vieta:</strong> {{ $conference->address }}</p>
        <p><strong>Data:</strong> {{ $conference->date_time }}</p>
        <p><strong>Statusas:</strong>
            <span class="badge {{ $conference->is_active ? 'bg-success' : 'bg-danger' }}">
                    {{ $conference->is_active ? 'Aktyvi' : 'Pasibaigusi' }}
                </span>
        </p>

        <hr>
        <a href="{{ route('conferences.index') }}" class="btn btn-secondary">Atgal į sąrašą</a>
        <a href="{{ route('conferences.edit', $conference->id) }}" class="btn btn-warning">Redaguoti</a>
    </div>
</div>
</body>
</html>
