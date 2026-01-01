@extends('layouts.app')

@section('content')
    <div class="container">
        <h1>{{ __('messages.edit_conference') }}</h1>

        <form action="{{ route('admin.conferences.update', $conference->id) }}" method="POST">
            @csrf
            @method('PUT')

            <div class="mb-3">
                <label>{{ __('messages.name') }}</label>
                <input type="text" name="title" value="{{ $conference->title }}" class="form-control" required>
            </div>

            <div class="mb-3">
                <label>{{ __('messages.lecturer') }}</label>
                <input type="text" name="lecturer" value="{{ $conference->lecturer }}" class="form-control" required>
            </div>

            <div class="mb-3">
                <label>Aprašymas</label>
                <textarea name="description" class="form-control">{{ $conference->description }}</textarea>
            </div>

            <div class="mb-3">
                <label>{{ __('messages.date') }}</label>
                <input type="datetime-local" name="date_time"
                       value="{{ date('Y-m-d\TH:i', strtotime($conference->date_time)) }}"
                       class="form-control" required>
            </div>

            <div class="mb-3">
                <label>Adresas</label>
                <input type="text" name="address" value="{{ $conference->address }}" class="form-control" required>
            </div>

            <button type="submit" class="btn btn-primary">Atnaujinti</button>
            <a href="{{ route('conferences.index') }}" class="btn btn-secondary">Atgal</a>
        </form>
    </div>
@endsection
