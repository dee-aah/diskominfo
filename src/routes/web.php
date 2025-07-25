<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\berandaController;

Route::get('/', function () {
    return view('welcome');
});
Route::resource( '/beranda', berandaController::class);
Route::get('/beranda', [berandaController::class, 'index']);
