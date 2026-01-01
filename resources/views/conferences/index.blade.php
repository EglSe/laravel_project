@extends('layouts.app')

@section('content')
    <div class="container mt-5">
        <div class="d-flex justify-content-between align-items-center mb-4">
            <h1 class="text-white">{{ __('messages.active_conferences') }}</h1>
            <a href="{{ route('conferences.create') }}" class="btn btn-success">
                + {{ __('messages.btn_create') }}
            </a>
        </div>

        <div class="card shadow">
            <div class="card-body p-0">
                <table class="table table-hover mb-0">
                    <thead class="table-dark">
                    <tr>
                        <th>{{ __('messages.name') }}</th>
                        <th>{{ __('messages.lecturer') }}</th>
                        <th>{{ __('messages.place') }}</th>
                        <th>{{ __('messages.date') }}</th>
                        <th>{{ __('messages.status') }}</th>
                        <th class="text-center">{{ __('messages.actions') }}</th>
                    </tr>
                    </thead>
                    <tbody>
                    @foreach($conferences as $conference)
                        <tr>
                            <td class="align-middle">{{ $conference->title }}</td>
                            <td class="align-middle">{{ $conference->lecturer }}</td>
                            <td class="align-middle">{{ $conference->address }}</td>
                            <td class="align-middle">{{ $conference->date_time }}</td>
                            <td class="align-middle">
                            <span class="badge {{ $conference->is_active ? 'bg-success' : 'bg-danger' }}">
                                {{ $conference->is_active ? __('messages.active') : __('messages.finished') }}
                            </span>
                            </td>
                            <td class="align-middle">
                                <div class="d-flex justify-content-center gap-2">
                                    <a href="{{ route('conferences.show', $conference->id) }}" class="btn btn-info btn-sm text-white">
                                        {{ __('messages.btn_view') }}
                                    </a>

                                    <a href="{{ route('conferences.edit', $conference->id) }}" class="btn btn-warning btn-sm text-white">
                                        {{ __('messages.btn_edit') }}
                                    </a>

                                    <form action="{{ route('conferences.destroy', $conference->id) }}" method="POST" onsubmit="return confirm('{{ __('messages.confirm_delete') }}')">
                                        @csrf
                                        @method('DELETE')
                                        <button type="submit" class="btn btn-danger btn-sm">{{ __('messages.btn_delete') }}</button>
                                    </form>
                                </div>
                            </td>
                        </tr>
                    @endforeach
                    </tbody>
                </table>
            </div>
        </div>
    </div>
@endsection
