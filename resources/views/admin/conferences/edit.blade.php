@extends('layouts.app')

@section('title', 'Redaguoti Konferenciją: ' . $conference->title)

@section('content')
    <div class="row">
        <div class="col-md-10 offset-md-1">
            <h1>Redaguoti Konferenciją: <span class="text-primary">{{ $conference->title }}</span></h1>
            <hr>

            {{-- back button --}}
            <a href="{{ route('admin.conferences.index') }}" class="btn btn-outline-secondary mb-4">
                <i class="bi bi-arrow-left"></i> Grįžti į sąrašą
            </a>

            {{-- success/ error message --}}
            @if (session('success'))
                <div class="alert alert-success">{{ session('success') }}</div>
            @endif


            <form action="{{ route('admin.conferences.update', $conference->id) }}" method="POST">
                @csrf
                @method('PUT')

                <div class="card p-4 shadow-sm">

                    {{-- title--}}
                    <div class="mb-3">
                        <label for="title" class="form-label">Pavadinimas</label>
                        <input type="text" class="form-control @error('title') is-invalid @enderror" id="title" name="title"
                               value="{{ old('title', $conference->title) }}" required>
                        @error('title')
                        <div class="invalid-feedback">{{ $message }}</div>
                        @enderror
                    </div>
                    {{-- lecturer--}}
                    <div class="mb-3">
                        <label for="lecturer" class="form-label">Dėstytojas</label>
                        <input type="text"
                               class="form-control @error('lecturer') is-invalid @enderror"
                               id="lecturer"
                               name="lecturer"
                               value="{{ old('lecturer', $conference->lecturer) }}"
                               required>

                        @error('lecturer')
                        <div class="invalid-feedback">{{ $message }}</div>
                        @enderror
                    </div>

                    {{-- location --}}
                    <div class="mb-3">
                        <label for="address" class="form-label">Adresas / Vieta</label>
                        <input type="text" class="form-control @error('address') is-invalid @enderror" id="address" name="address"
                               value="{{ old('address', $conference->address) }}" required>
                        @error('address')
                        <div class="invalid-feedback">{{ $message }}</div>
                        @enderror
                    </div>

                    {{-- Date and time --}}
                    <div class="mb-3">
                        <label for="date_time" class="form-label">Data ir Laikas</label>

                        <input type="datetime-local" class="form-control @error('date_time') is-invalid @enderror" id="date_time" name="date_time"
                               value="{{ old('date_time', \Carbon\Carbon::parse($conference->date_time)->format('Y-m-d\TH:i')) }}" required>
                        @error('date_time')
                        <div class="invalid-feedback">{{ $message }}</div>
                        @enderror
                    </div>

                    {{-- Activity status (Checkbox) --}}
                    <div class="mb-3 form-check">
                        @php

                            $isChecked = old('is_active', $conference->is_active);
                        @endphp
                        <input type="checkbox" class="form-check-input" id="is_active" name="is_active" value="1"
                            {{ $isChecked ? 'checked' : '' }}>
                        <label class="form-check-label" for="is_active">Ar konferencija aktyvi?</label>
                        @error('is_active')
                        <div class="invalid-feedback d-block">{{ $message }}</div>
                        @enderror
                    </div>

                    <div class="mt-4">
                        <button type="submit" class="btn btn-primary btn-lg">Atnaujinti Konferenciją</button>
                    </div>
                </div>

            </form>
        </div>
    </div>
@endsection
