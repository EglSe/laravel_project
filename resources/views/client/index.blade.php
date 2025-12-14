{{-- resources/views/client/index.blade.php --}}

@extends('layouts.app')

@section('title', 'Studento paskyros informacija')

@section('content')
    <div class="container mt-5">
        <div class="row justify-content-center">
            <div class="col-md-8">

                @if (session('success'))
                    <div class="alert alert-success">
                        {{ session('success') }}
                    </div>
                @endif

                <div class="glass-card p-4">

                    <h3 class="mb-4 text-center glass-title">
                        Mano duomenys
                    </h3>

                    <table class="table table-borderless glass-table mb-0">
                        <tbody>
                        <tr>
                            <th>Vardas, pavardė:</th>
                            <td>{{ $student->name }} {{ $student->surname }}</td>
                        </tr>
                        <tr>
                            <th>Grupės kodas:</th>
                            <td>{{ $student->group_code }}</td>
                        </tr>
                        </tbody>
                    </table>

                    <div class="mt-4 text-start">
                        <a href="{{ route('client.conferences.list') }}"
                           class="btn btn-success">
                            Rodyti aktyvias konferencijas
                        </a>
                    </div>

                </div>

            </div>
        </div>
    </div>
@endsection
