@extends('layouts.app')

@section('content')
    <div class="container mt-5 text-white">
        <h1>{{ __('messages.create_conference') }}</h1>

        <form action="{{ route('conferences.store') }}" method="POST" class="mt-4">
            @csrf
            <div class="mb-3">
                <label>{{ __('messages.name') }}</label>
                <input type="text" name="title" class="form-control" required>
            </div>

            <div class="mb-3">
                <label>{{ __('messages.lecturer') }}</label>
                <input type="text" name="lecturer" class="form-control" required>
            </div>

            <div class="mb-3">
                <label>{{ __('messages.place') }}</label>
                <input type="text" name="address" class="form-control" required>
            </div>

            <div class="mb-3">
                <label>{{ __('messages.date') }}</label>
                <input type="datetime-local" name="date_time" class="form-control" required>
            </div>

            <button type="submit" class="btn btn-success">{{ __('messages.btn_save') }}</button>
            <a href="{{ route('conferences.index') }}" class="btn btn-secondary">{{ __('messages.btn_back') }}</a>
        </form>
    </div>
@endsection
