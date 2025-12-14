@extends('layouts.app')

@section('title', 'Konferencija: ' . $conference->title . ' | Registracijos')

@section('content')
    <div class="row">
        <div class="col-md-12">
            <h1>Konferencijos Peržiūra Darbuotojui</h1>

            {{-- back button --}}
            <a href="{{ route('employee.index') }}" class="btn btn-outline-secondary mb-4">
                <i class="bi bi-arrow-left"></i> Grįžti į konferencijų sąrašą
            </a>

            <div class="glass-info-box">
                <h2 class="glass-title">{{ $conference->title }}</h2>

                @if($conference->lecturer)
                    <p>
                        <strong>Dėstytojas:</strong> {{ $conference->lecturer }}
                    </p>
                @endif

                <p>
                    <strong>Vieta:</strong> {{ $conference->address }}
                </p>

                <p>
                    <strong>Data:</strong>
                    {{ \Carbon\Carbon::parse($conference->date_time)->format('Y-m-d H:i') }}
                </p>
            </div>

            <hr>

            <h3 class="registrations-title">
                Klientų sąrašas (Viso: {{ $registrations->count() }})
            </h3>

            @if ($registrations->isEmpty())
                <div class="alert alert-warning">Nėra užsiregistravusių.</div>
            @else
                <table class="table table-bordered table-striped">
                    <thead>
                    <tr>
                        <th>Registracijos ID</th>
                        <th>Vardas</th>
                        <th>Pavardė</th>
                        <th>El. paštas</th>
                        <th>Registracijos Data</th>
                    </tr>
                    </thead>
                    <tbody>
                    @foreach ($registrations as $registration)
                        <tr>
                            <td>{{ $registration->id }}</td>
                            <td>{{ $registration->name }}</td>
                            <td>{{ $registration->surname }}</td>
                            <td>{{ $registration->email }}</td>
                            <td>{{ $registration->created_at->format('Y-m-d H:i') }}</td>
                        </tr>
                    @endforeach
                    </tbody>
                </table>
            @endif
        </div>
    </div>
@endsection
