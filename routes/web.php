<?php

use App\Http\Controllers\AuthController;
use App\Http\Controllers\MainController;
use App\Http\Middleware\checkIsNotLogged;
use App\Http\Middleware\chekIfLogged;
use Illuminate\Support\Facades\Route;

Route::middleware([checkIsNotLogged::class])->group(function(){
    Route::get('/login', [AuthController::class, 'index']);
    Route::post('/loginSubmit', [AuthController::class, 'loginSubmit']);
});


Route::middleware([chekIfLogged::class])->group(function(){
    Route::get('/', [MainController::class, 'index'])->name('home');
    Route::get('/newNote', [MainController::class, 'newNote'])->name('new');
    Route::get('/logout', [AuthController::class, 'logout'])->name('logout');
});
