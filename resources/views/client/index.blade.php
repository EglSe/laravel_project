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

                    <div class="mt-4 row g-2">
                        <div class="col-6">
                            {{-- Žalias mygtukas kaip anksčiau --}}
                            <a href="{{ route('client.conferences.list') }}"
                               class="btn btn-success w-100 py-2 fw">
                                Rodyti aktyvias konferencijas
                            </a>
                        </div>
                        <div class="col-6">
                            {{-- Pilkas mygtukas tokio pat dydžio --}}
                            <a href="{{ route('client.my_conferences') }}"
                               class="btn btn-secondary w-100 py-2 fw">
                                Mano konferencijos
                            </a>
                        </div>
                    </div>
                </div>

            </div>
        </div>
    </div>
@endsection
