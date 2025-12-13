<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\ClientController;
use App\Http\Controllers\EmployeeController;
use App\Http\Controllers\Admin\UserController;
use App\Http\Controllers\Admin\ConferenceController;


//main page
Route::get('/', function () {
    return view('main');
})->name('home');

//admin dashboard
Route::get('/admin', function () {
    return view('admin.dashboard');
})->name('admin.dashboard');


// Admin module

//conference management
Route::resource('admin/conferences', ConferenceController::class)
    ->names('admin.conferences');

//user management
Route::resource('admin/users', UserController::class)
    ->only(['index', 'edit', 'update'])
    ->names('admin.users');


//Employee module
Route::prefix('employee')->name('employee.')->controller(EmployeeController::class)->group(function () {
    // list of conferences
    Route::get('/', 'index')->name('conferences.index');
    // conference details (registered users)
    Route::get('/conference/{id}', 'show')->name('conferences.show');
});

//Client module
Route::prefix('client')->name('client.')->controller(ClientController::class)->group(function () {
    //list of conferences
    Route::get('/', 'index')->name('conferences.index');
    //conference view
    Route::get('/conference/{id}', 'show')->name('conferences.show');
    // registration
    Route::post('/register/{id}', 'register')->name('conferences.register');
});



