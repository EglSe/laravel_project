<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\ClientController;
use App\Http\Controllers\EmployeeController;
use App\Http\Controllers\Admin\UserController;
use App\Http\Controllers\Admin\ConferenceController;
use App\Http\Controllers\Admin\AdminController;

Auth::routes();

//main page
Route::get('/', function () {
    return view('main');
})->name('home');


// Admin module
Route::prefix('admin')->name('admin.')->group(function () {

    // Admin
    Route::get('/', [AdminController::class, 'index'])->name('dashboard');

    //  Admin\ConferenceController
    Route::resource('conferences', ConferenceController::class)
        ->names('conferences');

    // Admin\UserController
    Route::resource('users', UserController::class)
        ->only(['index', 'edit', 'update'])
        ->names('users');
});

//Employee module
Route::prefix('employee')->name('employee.')->controller(EmployeeController::class)->group(function () {
    // list of conferences
    Route::get('/', 'index')->name('index');
    // conference details (registered users)
    Route::get('/conference/{conference}', 'show')->name('show');
});

//Client module
Route::prefix('client')->name('client.')->controller(ClientController::class)->group(function () {
    //list of conferences
    Route::get('/', 'index')->name('index');
    //conference view
    Route::get('/conferences', 'listConferences')->name('conferences.list');

    Route::get('/conference/{conference}', 'show')->name('show');
    // registration
    Route::post('/conference/{conference}/register', 'storeRegistration')->name('register.store');
});




Auth::routes();

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');
