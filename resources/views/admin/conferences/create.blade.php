@extends('layouts.app')

@section('title', 'Kurti Naują Konferenciją')

@section('content')
    <div class="row">
        <div class="col-md-10 offset-md-1">
            <h1>Kurti Naują Konferenciją</h1>


            {{-- go back button--}}
            <a href="{{ route('admin.conferences.index') }}" class="btn btn-outline-secondary mb-4">
                <i class="bi bi-arrow-left"></i> Grįžti į sąrašą
            </a>


            <form action="{{ route('admin.conferences.store') }}" method="POST">
                @csrf

                <div class="card p-4 shadow-sm">

                    {{-- title --}}
                    <div class="mb-3">
                        <label for="title" class="form-label">Pavadinimas</label>
                        <input type="text" class="form-control @error('title') is-invalid @enderror" id="title" name="title" value="{{ old('title') }}" required>
                        @error('title')
                        <div class="invalid-feedback">{{ $message }}</div>
                        @enderror
                    </div>

                    <div class="mb-3">
                        <label for="lecturer" class="form-label">Dėstytojas</label>
                        <input type="text" class="form-control @error('lecturer') is-invalid @enderror" id="lecturer" name="lecturer" value="{{ old('title') }}" required>
                        @error('lecturer')
                        <div class="invalid-feedback">{{ $message }}</div>
                        @enderror
                    </div>

                    {{-- Adress  --}}
                    <div class="mb-3">
                        <label for="address" class="form-label">Adresas / Vieta</label>
                        <input type="text" class="form-control @error('address') is-invalid @enderror" id="address" name="address" value="{{ old('address') }}" required>
                        @error('address')
                        <div class="invalid-feedback">{{ $message }}</div>
                        @enderror
                    </div>

                    {{-- date and time (datetime-local) --}}
                    <div class="mb-3">
                        <label for="date_time" class="form-label">Data ir Laikas</label>
                        <input type="datetime-local" class="form-control @error('date_time') is-invalid @enderror" id="date_time" name="date_time" value="{{ old('date_time') }}" required>
                        @error('date_time')
                        <div class="invalid-feedback">{{ $message }}</div>
                        @enderror
                    </div>

                    {{-- status (Checkbox) --}}
                    <div class="mb-3 form-check">
                        <input type="checkbox" class="form-check-input" id="is_active" name="is_active" value="1" {{ old('is_active') ? 'checked' : '' }}>
                        <label class="form-check-label" for="is_active">Ar konferencija aktyvi?</label>
                        @error('is_active')
                        <div class="invalid-feedback d-block">{{ $message }}</div>
                        @enderror
                    </div>

                    <div class="mt-4">
                        <button type="submit" class="btn btn-success btn-lg">Sukurti Konferenciją</button>
                    </div>
                </div>

            </form>
        </div>
    </div>
@endsection
