{{-- resources/views/main.blade.php --}}

@extends('layouts.app')

@section('title', 'Sistemos Pagrindinis Puslapis')

@section('content')
    <div class="container mt-5">
        <div class="row justify-content-center">
            <div class="col-md-8">


                @auth

                    @php
                        $user = Auth::user();
                    @endphp

                    <div class="glass-card p-4 mb-5">
                        <h3 class="mb-4 text-center glass-title">
                             Studento informacija
                        </h3>

                        <table class="table table-borderless glass-table mb-0">
                            <tbody>
                            <tr>
                                <th>Vardas, pavardė:</th>
                                <td>{{ $user->name }} {{ $user->surname }}</td>
                            </tr>
                            <tr>
                                <th>Grupė:</th>
                                <td>{{ $user->group_code }}</td>
                            </tr>
                            </tbody>
                        </table>
                    </div>

                    {{-- role navigation --}}
                    <div class="card p-4 shadow-lg">
                        <h4 class="text-center mb-3">Nuorodos į Posistemius</h4>
                        <div class="d-grid gap-2">


                            <a href="{{ route('client.conferences.list') }}" class="btn btn-success btn-lg">

                            </a>

                            {{-- Roles --}}
                            @if ($user->role === 'client')
                                <a href="{{ route('client.index') }}" class="btn btn-primary btn-lg">Kliento Posistemis</a>
                            @endif

                            @if ($user->role === 'employee')
                                <a href="{{ route('employee.index') }}" class="btn btn-info btn-lg">Darbuotojo Posistemis</a>
                            @endif

                            @if ($user->role === 'admin')
                                <a href="{{ route('admin.dashboard') }}" class="btn btn-danger btn-lg">Administratoriaus Posistemis</a>
                            @endif

                        </div>
                    </div>
                @else
                    <form method="POST" action="{{ route('login') }}" class="glass-card p-4">
                        @csrf

                        <h3 class="text-center mb-4 glass-title">
                            Log In
                        </h3>

                        <div class="mb-3">
                            <label for="login" class="form-label">El. paštas</label>
                            <input type="text"
                                   id="login"
                                   name="login"
                                   class="form-control"
                                   placeholder="Įveskite el. paštą arba asmeninį kodą"
                                   value="{{ old('login') }}"
                                   required autofocus>
                        </div>

                        <div class="mb-3">
                            <label for="password" class="form-label">Slaptažodis</label>
                            <input type="password"
                                   id="password"
                                   name="password"
                                   class="form-control"
                                   placeholder="Įveskite slaptažodį"
                                   required>
                        </div>

                        <div class="d-flex justify-content-between align-items-center mb-4 px-1">
                            <div class="form-check mb-0">
                                <input class="form-check-input"
                                       type="checkbox"
                                       name="remember"
                                       id="remember">
                                <label class="form-check-label" for="remember">
                                    Atsiminti mane
                                </label>
                            </div>

                            <a href="{{ route('password.request') }}"
                               class="small text-info text-decoration-none">
                                Pamiršai slaptažodį?
                            </a>
                        </div>

                        <div class="d-flex justify-content-center gap-3 mt-4">
                            <button type="submit" class="btn btn-success btn-lg flex-fill">
                                <i class="fas fa-sign-in-alt"></i> Prisijungti
                            </button>

                        </div>


                        <div class="text-center mt-3">
                            <small class="text-muted">
                                Neturi paskyros?
                                <a href="#"
                                   class="small text-info text-decoration-none"
                                   data-bs-toggle="modal"
                                   data-bs-target="#registrationModal">
                                    Registruotis
                                </a>
                            </small>
                        </div>


                    {{-- JAVASCRIPT --}}
                    <script>
                        document.addEventListener('DOMContentLoaded', function() {
                            const loginTab = document.getElementById('login-tab');
                            const registerTab = document.getElementById('register-tab');
                            const loginForm = document.getElementById('login-form');
                            const registerForm = document.getElementById('register-form');

                            function setActiveForm(activeForm, inactiveForm, activeTab, inactiveTab) {
                                activeForm.classList.add('active');
                                inactiveForm.classList.remove('active');

                                activeTab.classList.remove('btn-outline-dark');
                                activeTab.classList.add('btn-dark');
                                inactiveTab.classList.add('btn-outline-dark');
                                inactiveTab.classList.remove('btn-dark');
                            }

                            // beggining
                            setActiveForm(loginForm, registerForm, loginTab, registerTab);

                            loginTab.addEventListener('click', () => {
                                setActiveForm(loginForm, registerForm, loginTab, registerTab);
                            });

                            registerTab.addEventListener('click', () => {
                                setActiveForm(registerForm, loginForm, registerTab, loginTab);
                            });
                        });
                    </script>
  @endauth

            </div>
        </div>
@endsection
