@extends('layouts.app')

@section('title', 'Darbuotojo Konferencijų Sąrašas')

@section('content')
    <div class="row">
        <div class="col-md-12">
            <h1>Konferencijų Sąrašas</h1>

            @if (session('success'))
                <div class="alert alert-success">{{ session('success') }}</div>
            @endif

            @if ($conferences->isEmpty())
                <div class="alert alert-info">Nėra sukurtų konferencijų.</div>
            @else
                <table class="table table-striped table-hover">
                    <thead>
                    <tr>
                        <th>#</th>
                        <th>Pavadinimas</th>
                        <th>Dėstytojas</th>
                        <th>Adresas</th>
                        <th>Data ir Laikas</th>
                        <th>Aktyvi</th>
                        <th>Užsiregistravę</th>
                        <th>Veiksmai</th>
                    </tr>
                    </thead>
                    <tbody>
                    @foreach ($conferences as $conference)
                        <tr>
                            <td>{{ $conference->id }}</td>
                            <td>{{ $conference->title }}</td>
                            <td>{{ $conference->lecturer }}</td>
                            <td>{{ $conference->address }}</td>
                            <td>{{ \Carbon\Carbon::parse($conference->date_time)->format('Y-m-d H:i') }}</td>
                            <td>
                                @if ($conference->is_active)
                                    <span class="badge bg-success">Taip</span>
                                @else
                                    <span class="badge bg-danger">Ne</span>
                                @endif
                            </td>
                            {{-- registration number --}}
                            <td>{{ $conference->registrations->count() }}</td>
                            <td>
                                {{--  EmployeeController@show, check registrations --}}
                                <a href="{{ route('employee.show', $conference->id) }}" class="btn btn-sm btn-info text-white">
                                    <i class="bi bi-eye"></i> Peržiūrėti Klientus
                                </a>
                            </td>
                        </tr>
                    @endforeach
                    </tbody>
                </table>
            @endif
        </div>
    </div>
@endsection
