<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AuthController;
use App\Http\Controllers\TodoController;

Route::get('/', function () {
    return view('welcome');
});

// Auth routes
Route::controller(AuthController::class)->group(function () {
    Route::get('register', 'register')->name('register');
    Route::post('register', 'registerSave')->name('register.save');

    Route::get('login', 'login')->name('login');
    Route::post('login', 'loginAction')->name('login.action');

    Route::get('logout', 'logout')->middleware('auth')->name('logout');
});

// Protected routes
Route::middleware('auth')->group(function () {
    Route::get('dashboard', function () {
        return view('dashboard');
    })->name('dashboard');

    // ✅ Todo Routes (replacing products)
    Route::controller(TodoController::class)->prefix('todos')->group(function () {
        Route::get('', 'index')->name('todos.index');
        Route::get('create', 'create')->name('todos.create');
        Route::post('store', 'store')->name('todos.store');
        Route::get('show/{id}', 'show')->name('todos.show');
        Route::get('edit/{id}', 'edit')->name('todos.edit');
        Route::put('edit/{id}', 'update')->name('todos.update');
        Route::delete('destroy/{id}', 'destroy')->name('todos.destroy');
    });

    // Profile (if implemented)
    Route::get('/profile', [AuthController::class, 'profile'])->name('profile');
    Route::post('/profile', [AuthController::class, 'updateProfile'])->name('profile.update');
});
