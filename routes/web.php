<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\NinjaController;
use App\Http\Controllers\AuthController;

Route::get('/', function () {
    return view('welcome');
});


// Authentication routes
// register 
Route::get('/register', [AuthController::class, 'showRegister'])->name('show.register');
// login 
Route::get('/login', [AuthController::class, 'showLogin'])->name('show.login');
// post 
Route::post('/register', [AuthController::class, 'register'])->name('register');
// login 
Route::post('/login', [AuthController::class, 'login'])->name('login');
// logout
Route::post('/logout', [AuthController::class, 'logout'])->name('logout');



// Dojo routes
Route::get('/ninjas', [NinjaController::class, 'index'])->name('ninjas.index');
Route::get('/ninjas/create', [NinjaController::class, 'create'])->name('ninjas.create');
Route::get('/ninjas/{ninja}', [NinjaController::class, 'show'])->name('ninjas.show');
Route::post('/ninjas', [NinjaController::class, 'store'])->name('ninjas.store');
Route::delete('/ninjas/{ninja}', [NinjaController::class, 'destroy'])->name('ninjas.destroy');
