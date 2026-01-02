@extends('layouts.app')

@section('content')
    <div class="container mt-5">
        <div class="glass-card p-4">
            <h3 class="text-light mb-4 text-center">Mano konferencijos</h3>

            @if($registrations->isEmpty())
                <p class="text-white text-center">Jūs dar nesate užsiregistravę į jokią konferenciją.</p>
            @else
                <table class="table text-light">
                    <thead>
                    <tr>
                        <th>Konferencija</th>
                        <th>Data</th>
                        <th>Vieta</th>
                    </tr>
                    </thead>
                    <tbody>
                    @foreach($registrations as $reg)
                        <tr>
                            <td>{{ $reg->conference->title }}</td>
                            <td>{{ $reg->conference->date_time }}</td>
                            <td>{{ $reg->conference->address }}</td>
                        </tr>
                    @endforeach
                    </tbody>
                </table>
            @endif
            <div class="mt-3">
                <a href="{{ route('client.index') }}" class="btn btn-secondary">Atgal</a>
            </div>
        </div>
    </div>
@endsection
