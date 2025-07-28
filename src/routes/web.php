<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\berandaController;
use App\Http\Controllers\tupoksiController;
use App\Http\Controllers\visimisiController;

Route::get('/', function () {
    return view('welcome');
});
Route::get('/beranda', [berandaController::class, 'index']);
Route::resource(name: '/visimisi',  controller: visimisiController::class);
Route::resource(name: '/tupoksi',  controller: tupoksiController::class);
