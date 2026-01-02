<?php

use Illuminate\Support\Facades\Route;
use Illuminate\Support\Facades\Auth;
use App\Http\Controllers\ClientController;
use App\Http\Controllers\EmployeeController;
use App\Http\Controllers\Admin\UserController;
use App\Http\Controllers\Admin\AdminController;
use App\Http\Controllers\Admin\ConferenceController as AdminConferenceController;
use App\Http\Controllers\ConferenceController;
use App\Http\Controllers\Auth\LoginController;

// main page
Route::get('/', function () {
    $user = Auth::user();

    // if admin --- his main page
    if ($user->isAdmin()) {
        return redirect()->route('admin.dashboard');
    }

    // if employee --- his main page
    if ($user->role === 'employee') {
        return redirect()->route('employee.index');
    }

    // if client
    return app(App\Http\Controllers\ClientController::class)->index();
})->middleware('auth')->name('home');
//
Route::get('/login', [LoginController::class, 'showLoginForm'])->name('login');
Route::post('/login', [LoginController::class, 'login']);
Route::post('/logout', [LoginController::class, 'logout'])->name('logout');

// Conferences
Route::get('/conferences', [ConferenceController::class, 'index'])->name('conferences.index');
Route::get('/conferences/{conference}', [ConferenceController::class, 'show'])->name('conferences.show');

// Admin
Route::prefix('admin')->name('admin.')->middleware(['auth', 'admin'])->group(function () {
    Route::get('/', [AdminController::class, 'index'])->name('dashboard');
    Route::resource('conferences', AdminConferenceController::class); // Naudojame Admin variantą
    Route::resource('users', UserController::class)->only(['index', 'edit', 'update', 'destroy']);
});

// Employee
Route::prefix('employee')->name('employee.')->middleware(['auth'])->group(function () {
    Route::get('/', [EmployeeController::class, 'index'])->name('index');Route::get('/conference/{id}', [EmployeeController::class, 'show'])->name('show');
});

// Client
Route::prefix('client')->name('client.')->middleware(['auth'])->group(function () {
    Route::get('/', [ClientController::class, 'index'])->name('index');
    Route::get('/conferences', [ClientController::class, 'listConferences'])->name('conferences.list');
    Route::get('/conferences/{conference}', [ClientController::class, 'show'])->name('show');
    Route::post('/conferences/{conference}/register', [ClientController::class, 'storeRegistration'])->name('register.store');  Route::get('/my-conferences', [ClientController::class, 'myConferences'])->name('my_conferences');
});

Auth::routes(['register' => true]);
