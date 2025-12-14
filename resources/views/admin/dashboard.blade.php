@extends('layouts.admin')

@section('content')
    <div class="container mt-5">
        <h1 class="text-center mb-4 text-light">
            Sistemos administravimo aplinka
        </h1>

        <div class="row justify-content-center">
            <div class="col-md-8">

                <div class="glass-panel p-4">

                    <div class="glass-list">

                        <a href="{{ route('admin.conferences.index') }}"
                           class="glass-item">
                            <div>
                                <i class="bi bi-calendar-event me-2"></i>
                                Konferencijų valdymas
                            </div>
                            <i class="bi bi-chevron-right"></i>
                        </a>

                        <a href="{{ route('admin.users.index') }}"
                           class="glass-item">
                            <div>
                                <i class="bi bi-people me-2"></i>
                                Naudotojų duomenų valdymas
                            </div>
                            <i class="bi bi-chevron-right"></i>
                        </a>

                    </div>

                </div>

            </div>
        </div>
    </div>
@endsection
