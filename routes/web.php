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
    Route::post('/newNoteSubmit', [MainController::class, 'newNoteSubmit'])->name('newNoteSubmit');

    // Edit note
    Route::get('/editNote/{id}', [MainController::class, 'editNote'])->name('edit');
    Route::post('/editNoteSubmit', [MainController::class, 'editNoteSubmit'])->name('editNoteSubmit');

    //delete Note
    Route::get('/deleteNote/{id}', [MainController::class, 'deleteNote'])->name('delete');
    Route::get('/deleteNoteConfirm/{id}', [MainController::class, 'deleteNoteConfirm'])->name('deleteConfirm');

    Route::get('/logout', [AuthController::class, 'logout'])->name('logout');
});
