@extends('layouts.app')

@section('content')
    <div class="container mt-5">
        <div class="row justify-content-center">
            <div class="col-md-5">
                {{-- Naudojame jūsų liquid glass klasę vietoj 'card' --}}
                <div class="glass-panel p-4 shadow-lg">
                    <div class="text-center mb-4">
                        <h3 class="glass-title text-light">{{ __('Prisijungimas') }}</h3>
                    </div>

                    <div class="glass-body">
                        <form method="POST" action="{{ route('login') }}">
                            @csrf

                            <div class="mb-3">
                                <label for="email" class="form-label text-light">{{ __('El. pašto adresas') }}</label>
                                <input id="email" type="email" class="form-control glass-input @error('email') is-invalid @enderror"
                                       name="email" value="{{ old('email') }}" required autocomplete="email" autofocus>
                                @error('email')
                                <span class="invalid-feedback" role="alert"><strong>{{ $message }}</strong></span>
                                @enderror
                            </div>

                            <div class="mb-4">
                                <label for="password" class="form-label text-light">{{ __('Slaptažodis') }}</label>
                                <input id="password" type="password" class="form-control glass-input @error('password') is-invalid @enderror"
                                       name="password" required autocomplete="current-password">
                                @error('password')
                                <span class="invalid-feedback" role="alert"><strong>{{ $message }}</strong></span>
                                @enderror
                            </div>

                            <div class="mb-3 form-check">
                                <input class="form-input-check" type="checkbox" name="remember" id="remember" {{ old('remember') ? 'checked' : '' }}>
                                <label class="form-check-label text-light" for="remember">
                                    {{ __('Prisiminti mane') }}
                                </label>
                            </div>

                            <div class="d-grid">
                                <button type="submit" class="btn btn-success btn-lg text-white shadow">
                                    {{ __('Prisijungti') }}
                                </button>
                            </div>

                            <div class="text-center mt-4 pt-3 border-top border-secondary border-opacity-25">
    <span class="text-light opacity-75">
        Neturi paskyros?
    </span>

                                <a href="{{ route('register') }}"
                                   class="fw-semibold text-success text-decoration-none ms-1 register-link">
                                    Registruokis
                                </a>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
