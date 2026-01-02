{{-- resources/views/main.blade.php --}}
@extends('layouts.app')

@section('title', 'Sistemos Pagrindinis Puslapis')

@section('content')
    <div class="container mt-5">
        <div class="row justify-content-center">
            <div class="col-md-8">

                @auth
                    @php $user = Auth::user(); @endphp

                    {{-- 1. INFORMACINIS BLOKAS (Rodomas TIK jei vartotojas NĖRA administratorius) --}}
                    @if(!$user->isAdmin())
                        <div class="glass-card p-4 mb-5">
                            <h3 class="mb-4 text-center glass-title">Naudotojo informacija</h3>
                            <table class="table table-borderless glass-table mb-0">
                                <tbody>
                                <tr>
                                    <th>Vardas, pavardė:</th>
                                    <td>{{ $user->name }} {{ $user->surname }}</td>
                                </tr>
                                <tr>
                                    <th>Grupės kodas:</th>
                                    <td>{{ $user->group_code }}</td>
                                </tr>
                                </tbody>
                            </table>
                        </div>
                    @endif

                    {{-- 2. NAVIGACIJOS BLOKAS (Nuorodos pagal roles) --}}
                    <div class="card p-4 shadow-lg">
                        <h4 class="text-center mb-3">
                            {{ $user->isAdmin() ? 'Administratoriaus Valdymas' : 'Nuorodos į Posistemius' }}
                        </h4>

                        <div class="d-grid gap-2">
                            {{-- Bendras mygtukas visiems --}}
                            <a href="{{ route('conferences.index') }}" class="btn btn-success btn-lg">Visos Konferencijos</a>

                            {{-- Admin --}}
                            @if ($user->isAdmin())
                                <a href="{{ route('admin.dashboard') }}" class="btn btn-danger btn-lg">Pagrindinis Admin Skydas</a>
                                <a href="{{ route('admin.users.index') }}" class="btn btn-warning btn-lg">Vartotojų valdymas (9 punktas)</a>
                            @endif

                            {{-- Employee --}}
                            @if ($user->role === 'employee')
                                <a href="{{ route('employee.index') }}" class="btn btn-info btn-lg">Darbuotojo Posistemis</a>
                            @endif

                            {{-- Client --}}
                            @if ($user->role === 'client')
                                <a href="{{ route('client.index') }}" class="btn btn-primary btn-lg">Mano registracijos</a>
                            @endif
                        </div>
                    </div>
                @else
                    {{-- Jei neprisijungęs, nukreipiame į login arba rodome pranešimą --}}
                    <div class="alert alert-warning text-center">
                        Prašome prisijungti, kad matytumėte turinį.
                        <br><br>
                        <a href="{{ route('login') }}" class="btn btn-primary">Prisijungti</a>
                    </div>
                @endauth

            </div>
        </div>
    </div>
@endsection
