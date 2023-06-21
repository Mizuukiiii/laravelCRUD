<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AuthController;
use App\Http\Controllers\CategoryController;
use App\Http\Controllers\RecipeController;

Route::get('/', function () {
    return view('layouts.app');
});

Route::put('/categories/{category}', [CategoryController::class, 'update'])->name('categories.update');

Route::get('/login', function () {
    return view('auth.login');
})->name('login');

Route::post('/login', [AuthController::class, 'loginPost'])->name('login.post');
Route::post('/logout', [AuthController::class, 'logout'])->name('logout');

Route::resource('recipes', RecipeController::class);
Route::resource('categories', CategoryController::class);
