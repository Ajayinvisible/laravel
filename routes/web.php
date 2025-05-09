<?php

use App\Http\Controllers\FrontendController;
use Illuminate\Support\Facades\Route;


Route::get('/', [FrontendController::class, 'home'])->name('home');
Route::get('/about', [FrontendController::class, 'about'])->name('about');
Route::post('/save', [FrontendController::class, 'saveData'])->name('save');
Route::delete('/delete/{id}', [FrontendController::class, 'destroy'])->name('delete');

