<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\MenuController;
use App\Http\Controllers\OrderController;

Route::get('/', function () {
    return view('welcome');
});

Route::get('/logout', function () {
    return view('welcome');
})->name('logout');

Route::get('/dashboard', function () {
    return view('dashboard');
})->name('dashboard');

Route::get('/history', function () {
    return view('history');
})->name('history');

Route::resource('menu', MenuController::class);

Route::get('/menu', [MenuController::class, 'index'])->name('menu.index');
Route::post('/menu/store', [MenuController::class, 'store'])->name('menu.store');
Route::post('/menu', [MenuController::class, 'store'])->name('menu.store');
Route::get('/menu/{menu}/edit', [MenuController::class, 'edit'])->name('menu.edit');
Route::put('/menu/{menu}', [MenuController::class, 'update'])->name('menu.update');
Route::delete('/menu/{menu}', [MenuController::class, 'destroy'])->name('menu.destroy');

Route::get('/order', [OrderController::class, 'create'])->name('order.create');
Route::post('/order', [OrderController::class, 'store'])->name('order.store');
Route::get('/order', [MenuController::class, 'order'])->name('order.index');
