@extends('layouts.admin')

@section('title', 'Redaguoti Naudotoją')

@section('content')
    <div class="container mt-4">
        <h1>Redaguoti Naudotoją: {{ $user->name }} {{ $user->surname }}</h1>
        <hr>

        {{-- Klaidos Pranešimas --}}
        @if ($errors->any())
            <div class="alert alert-danger">
                Prašome ištaisyti šias klaidas:
                <ul>
                    @foreach ($errors->all() as $error)
                        <li>{{ $error }}</li>
                    @endforeach
                </ul>
            </div>
        @endif

        {{-- FORM --}}
        <form method="POST" action="{{ route('admin.users.update', $user) }}">
            @csrf
            @method('PUT')

            {{-- name --}}
            <div class="mb-3">
                <label for="name" class="form-label">Vardas</label>
                <input type="text" class="form-control @error('name') is-invalid @enderror"
                       id="name" name="name"
                       value="{{ old('name', $user->name) }}" required>
                @error('name')
                <div class="invalid-feedback">{{ $message }}</div>
                @enderror
            </div>

            {{-- surname --}}
            <div class="mb-3">
                <label for="surname" class="form-label">Pavardė</label>
                <input type="text" class="form-control @error('surname') is-invalid @enderror"
                       id="surname" name="surname"
                       value="{{ old('surname', $user->surname) }}" required>
                @error('surname')
                <div class="invalid-feedback">{{ $message }}</div>
                @enderror
            </div>

            {{-- Email --}}
            <div class="mb-3">
                <label for="email" class="form-label">El. pašto adresas</label>
                <input type="email" class="form-control @error('email') is-invalid @enderror"
                       id="email" name="email"
                       value="{{ old('email', $user->email) }}" required>
                @error('email')
                <div class="invalid-feedback">{{ $message }}</div>
                @enderror
            </div>

            <button type="submit" class="btn btn-success">Patvirtinti Atnaujinimą</button>
            <a href="{{ route('admin.users.index') }}" class="btn btn-secondary">Atšaukti</a>
        </form>
    </div>
@endsection
