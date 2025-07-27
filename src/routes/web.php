<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\berandaController;

Route::get('/', function () {
    return view('welcome');
});
Route::get('/beranda', [berandaController::class, 'index']);
