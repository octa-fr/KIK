<?php

use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('login');
});
Route::post('/login', [\App\Http\Controllers\AuthController::class, 'login']);

Route::get('/register', function () {
    return view('register');
});
Route::post('/register', [\App\Http\Controllers\AuthController::class, 'register']);

Route::get('/admin/dashboard', function () {
    return 'Dashboard Admin';
});

Route::get('/mitra/dashboard', function () {
    return 'Dashboard Mitra';
});

Route::get('/user/dashboard', function () {
    return 'Dashboard User';
});
    