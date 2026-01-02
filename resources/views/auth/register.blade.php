@extends('layouts.app')

@section('content')
    <div class="container mt-5">
        <div class="row justify-content-center">
            <div class="col-md-5">
                <div class="glass-panel p-4 shadow-lg text-center">
                    <h2 class="text-white mb-4">Registracija</h2>

                    <form method="POST" action="{{ route('register') }}">
                        @csrf

                        <div class="mb-3 text-start">
                            <label for="name" class="text-white opacity-75 ms-1">Vardas</label>
                            <input id="name" type="text" class="form-control glass-input @error('name') is-invalid @enderror" name="name" value="{{ old('name') }}" required autofocus>
                            @error('name')
                            <span class="text-danger small">{{ $message }}</span>
                            @enderror
                        </div>

                        <div class="mb-3 text-start">
                            <label for="surname" class="text-white opacity-75 ms-1">Pavardė</label>
                            <input id="surname" type="text" class="form-control glass-input @error('surname') is-invalid @enderror" name="surname" value="{{ old('surname') }}" required>
                            @error('surname')
                            <span class="text-danger small">{{ $message }}</span>
                            @enderror
                        </div>

                        <div class="mb-3 text-start">
                            <label for="email" class="text-white opacity-75 ms-1">El. pašto adresas</label>
                            <input id="email" type="email" class="form-control glass-input @error('email') is-invalid @enderror" name="email" value="{{ old('email') }}" required>
                            @error('email')
                            <span class="text-danger small">{{ $message }}</span>
                            @enderror
                        </div>

                        <div class="mb-3 text-start">
                            <label for="password" class="text-white opacity-75 ms-1">Slaptažodis</label>
                            <input id="password" type="password" class="form-control glass-input @error('password') is-invalid @enderror" name="password" required>
                            @error('password')
                            <span class="text-danger small">{{ $message }}</span>
                            @enderror
                        </div>

                        <div class="mb-4 text-start">
                            <label for="password-confirm" class="text-white opacity-75 ms-1">Pakartokite slaptažodį</label>
                            <input id="password-confirm" type="password" class="form-control glass-input" name="password_confirmation" required>
                        </div>

                        <button type="submit" class="btn btn-success w-100 py-2 fw-bold mb-3">
                           Registruotis
                        </button>
                        @if (session('success'))
                            <div class="alert alert-success glass-panel text-white border-0 mb-4 text-center">
                                {{ session('success') }}
                            </div>
                        @endif
                        <div class="mt-2 text-white opacity-75">
                            Jau turite paskyrą? <a href="{{ route('login') }}" class="text-success text-decoration-none fw-bold">Prisijunkite</a>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
@endsection
