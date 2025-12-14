@extends('layouts.app')

@section('title', 'Konferencijų sąrašas')

@section('content')
    <div class="row">
        <div class="col-12">
            <h1 class="mb-4 page-heading">Konferencijų sąrašas</h1>
        </div>
    </div>

    <div class="row">
        @forelse ($conferences as $conference)
            <div class="col-12 col-md-6 mb-4">
                <div class="card h-100 glass-card-index">
                    <div class="card-body d-flex flex-column">

                        <div class="d-flex justify-content-between align-items-center mb-3">
                            <h4 class="fw-bold mb-0">
                                {{ $conference->title }}
                            </h4>
                        </div>

                        <div class="flex-grow-1">
                            <p class="small mb-1">
                                <i class="bi bi-clock"></i>
                                Data: {{ \Carbon\Carbon::parse($conference->date_time)->format('Y-m-d H:i') }}
                            </p>

                            @if($conference->lecturer)
                                <p class="small mb-1">
                                    <i class="bi bi-person-fill"></i>
                                    Dėstytojas: {{ $conference->lecturer }}
                                </p>
                            @endif

                            <p class="small mb-3">
                                <i class="bi bi-geo-alt"></i>
                                Vieta: {{ $conference->address }}
                            </p>
                        </div>

                        <div class="mt-auto">
                            <a href="{{ route('client.show', $conference->id) }}"
                               class="btn btn-outline-light btn-sm w-100">
                                Žiūrėti detales
                            </a>
                        </div>

                    </div>
                </div>
            </div>
        @empty
            <div class="col-12">
                <div class="glass-card-index text-center">
                    <p class="mb-0">Aktyvių konferencijų nėra.</p>
                </div>
            </div>
        @endforelse
    </div>
@endsection

