<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\MenuController;

Route::get('/', function () {
    return view('welcome');
});

Route::get('/logout', function () {
    return view('welcome');
})->name('logout');

Route::get('/dashboard', function () {
    return view('dashboard');
})->name('dashboard');

Route::get('/order', function () {
    return view('order');
})->name('order');

Route::get('/history', function () {
    return view('history');
})->name('history');


Route::resource('menu', MenuController::class);
