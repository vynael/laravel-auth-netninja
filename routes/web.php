<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\NinjaController;
use App\Http\Controllers\AuthController;
use Illuminate\Support\Facades\Session;

Route::get('/', function () {
    Session::flash('logged_in', 'You already logged in');
    return view('welcome');
});


// Authentication routes
// guest middleware is used to protect routes that should not be accessible to authenticated users
// logout
Route::post('/logout', [AuthController::class, 'logout'])->name('logout');
Route::middleware('guest')->controller(AuthController::class)->group(function () {
    // register 
    Route::get('/register', 'showRegister')->name('show.register');
    // login 
    Route::get('/login', 'showLogin')->name('show.login');
    // post 
    Route::post('/register', 'register')->name('register');
    // login 
    Route::post('/login', 'login')->name('login');
});
// auth user middleware is used to protect routes that should only be accessible to authenticated users
Route::middleware('auth')->controller(NinjaController::class)->group(function () {
    // Dojo routes
    Route::get('/ninjas', 'index')->name('ninjas.index');
    Route::get('/ninjas/create', 'create')->name('ninjas.create')->middleware('auth');
    Route::get('/ninjas/{ninja}', 'show')->name('ninjas.show');
    Route::post('/ninjas', 'store')->name('ninjas.store');
    Route::delete('/ninjas/{ninja}', 'destroy')->name('ninjas.destroy');
});


// notes
// by default, Laravel use 2 middleware = auth, and guest