<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AuthController;
use App\Http\Controllers\AdminController;
use App\Http\Controllers\MitraController;
use App\Http\Controllers\UserController;
use App\Http\Controllers\PostController;

Route::get('/', function () {
    return view('login');
})->name('login');

Route::post('/login', [AuthController::class, 'login']);

Route::get('/register', function () {
    return view('register');
});

Route::post('/register', [AuthController::class, 'register']);

Route::post('/logout', [AuthController::class, 'logout']);


Route::middleware(['auth','role:admin'])->group(function () {
    Route::get('/admin/dashboard', [AdminController::class, 'dashboard']);
    Route::get('/admin/users', [AdminController::class, 'users']);
    Route::post('/admin/verify-mitra/{id}', [AdminController::class, 'verifyMitra']);
    Route::post('/user/mitra-request', [UserController::class, 'requestMitra'])
    ->middleware('auth');
});


Route::middleware(['auth','role:mitra'])->group(function () {
    Route::get('/mitra/dashboard', [MitraController::class, 'dashboard']);
    Route::resource('/mitra/posts', PostController::class);
    Route::post('/mitra/request/{id}/accept', [MitraController::class, 'accept']);
    Route::post('/mitra/request/{id}/reject', [MitraController::class, 'reject']);
    Route::delete('/mitra/posts/{id}', [PostController::class, 'destroy']);
    Route::get('/mitra/posts/{id}/edit', [PostController::class, 'edit'])->name('mitra.posts.edit');
    Route::put('/mitra/posts/{id}', [PostController::class, 'update'])->name('mitra.posts.update');
    Route::get('/admin/mitra-requests', [AdminController::class, 'mitraRequests'])
    ->middleware('auth');
});


Route::middleware(['auth','role:user'])->group(function () {
    Route::get('/user/dashboard', [UserController::class, 'dashboard']);
    Route::post('/user/apply/{postId}', [UserController::class, 'apply']);
    Route::post('/admin/mitra-approve/{id}', [AdminController::class, 'approveMitra'])
    ->middleware('auth');
});
