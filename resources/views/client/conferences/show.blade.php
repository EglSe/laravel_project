@extends('layouts.app')

@section('title', $conference->title)

@section('content')
    <div class="d-flex align-items-center justify-content-center min-vh-100">
        <div class="col-md-8 col-lg-6">

            <div class="liquid-glass-card p-5">

                {{-- conference information --}}
                <h1 class="mb-2 text-center">{{ $conference->title }}</h1>
                <div class="row mb-3"></div>


                <dl class="row">

                    {{-- lecturer --}}
                    @if($conference->lecturer)
                        <dt class="col-sm-5">Dėstytojas:</dt>
                        {{-- Reikšmė sulygiuota dešinėje (end) --}}
                        <dd class="col-sm-7 text-center-left">
                            <span class="fw-bold">{{ $conference->lecturer }}</span>
                        </dd>
                    @endif

                    {{-- location --}}
                    <dt class="col-sm-5">Vieta:</dt>
                    {{-- Reikšmė sulygiuota dešinėje (end) --}}
                    <dd class="col-sm-7 text-center-left">
                        <span class="fw-bold">{{ $conference->address }}</span>
                    </dd>

                    {{-- date and time --}}
                    <dt class="col-sm-5">Data ir laikas:</dt>
                    {{-- Reikšmė sulygiuota dešinėje (end) --}}
                    <dd class="col-sm-7 text-center-left">{{ \Carbon\Carbon::parse($conference->date_time)->format('Y-m-d H:i') }}</dd>

                    {{-- status --}}
                    <dt class="col-sm-5">Statusas:</dt>
                    {{-- Reikšmė sulygiuota dešinėje (end) --}}
                    <dd class="col-sm-7 text-center-left">
                        @if($conference->is_active)
                            <span class="badge bg-success">Aktyvus</span>
                        @else
                            <span class="badge bg-danger">Neaktyvus</span>
                        @endif
                    </dd>
                </dl>

                <hr>

                {{-- Registracijos forma --}}
                <h3 class="mt-4 mb-3 text-center">Registracija į konferenciją</h3>

                @if (session('success'))
                    <div class="alert alert-success">{{ session('success') }}</div>
                @endif

                @if (session('error'))
                    <div class="alert alert-danger">{{ session('error') }}</div>
                @endif

                <form method="POST" action="{{ route('client.register.store', $conference->id) }}">
                    @csrf

                    <div class="mb-3">
                        <label for="name" class="form-label">Vardas</label>
                        <input type="text" class="form-control @error('name') is-invalid @enderror"
                               id="name" name="name" value="{{ old('name') }}" required>
                        @error('name')
                        <div class="invalid-feedback">{{ $message }}</div>
                        @enderror
                    </div>

                    <div class="mb-3">
                        <label for="surname" class="form-label">Pavardė</label>
                        <input type="text" class="form-control @error('surname') is-invalid @enderror"
                               id="surname" name="surname" value="{{ old('surname') }}" required>
                        @error('surname')
                        <div class="invalid-feedback">{{ $message }}</div>
                        @enderror
                    </div>

                    <div class="mb-3">
                        <label for="email" class="form-label">El. paštas</label>
                        <input type="email" class="form-control @error('email') is-invalid @enderror"
                               id="email" name="email" value="{{ old('email') }}" required>
                        @error('email')
                        <div class="invalid-feedback">{{ $message }}</div>
                        @enderror
                    </div>


                    <div class="d-flex gap-2 mt-3">
                        <button type="submit" class="btn btn-success btn-lg flex-fill">
                            Registruotis
                        </button>

                        <a href="{{ route('client.index') }}"
                           class="btn btn-outline-light btn-lg flex-fill">
                            Grįžti atgal
                        </a>
                    </div>

                </form>
            </div>
        </div>
    </div>
@endsection


