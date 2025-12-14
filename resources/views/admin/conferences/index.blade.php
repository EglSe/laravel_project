@extends('layouts.app')

@section('title', 'Administratorius | Konferencijos')

@section('content')
    <div class="row mb-4">
        <div class="col-12 d-flex justify-content-between align-items-center">
            <h1>Konferencijų Sąrašas</h1>

            {{-- create new conference --}}
            <a href="{{ route('admin.conferences.create') }}" class="btn btn-success">
                <i class="bi bi-plus-circle"></i> Kurti Naują Konferenciją
            </a>
        </div>
    </div>

    {{-- success/ error message --}}
    @if (session('success'))
        <div class="alert alert-success">{{ session('success') }}</div>
    @endif
    @if (session('error'))
        <div class="alert alert-danger">{{ session('error') }}</div>
    @endif

    <div class="row">
        <div class="col-12">
            @if ($conferences->isEmpty())
                <p class="alert alert-info">Konferencijų kol kas nėra. Sukurkite naują.</p>
            @else
                <div class="table-responsive">
                    <table class="table table-striped table-hover align-middle">
                        <thead>
                        <tr>
                            <th>ID</th>
                            <th>Pavadinimas</th>
                            <th>Dėstytojas</th>
                            <th>Data ir Laikas</th>
                            <th>Vieta</th>
                            <th>Aktyvi</th>
                            <th class="text-center">Veiksmai</th>
                        </tr>
                        </thead>
                        <tbody>
                        @foreach ($conferences as $conference)
                            <tr>
                                <td>{{ $conference->id }}</td>
                                <td class="fw-bold">{{ $conference->title }}</td>
                                <td>{{ $conference->lecturer }}</td>
                                <td>{{ \Carbon\Carbon::parse($conference->date_time)->format('Y-m-d H:i') }}</td>
                                <td>{{ $conference->address }}</td>
                                <td>
                                        <span class="badge bg-{{ $conference->is_active ? 'success' : 'danger' }}">
                                            {{ $conference->is_active ? 'Taip' : 'Ne' }}
                                        </span>
                                </td>
                                <td class="text-center" style="min-width: 180px;">
                                    {{-- Redagavimo mygtukas --}}
                                    <a href="{{ route('admin.conferences.edit', $conference->id) }}" class="btn btn-sm btn-primary me-2">
                                        Redaguoti
                                    </a>

                                    {{-- delete form button --}}
                                    <form action="{{ route('admin.conferences.destroy', $conference->id) }}" method="POST" class="d-inline">
                                        @csrf
                                        @method('DELETE')
                                        <button type="submit" class="btn btn-sm btn-danger" onclick="return confirm('Ar tikrai norite pašalinti konferenciją: {{ $conference->title }}?')">
                                            Šalinti
                                        </button>
                                    </form>
                                </td>
                            </tr>
                        @endforeach
                        </tbody>
                    </table>
                </div>
            @endif
        </div>
    </div>
@endsection
