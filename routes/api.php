<?php

use App\Http\Controllers\AuthController;
use App\Http\Controllers\EducationAndResourceController;
use App\Http\Controllers\RaceController;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;



Route::post('/login', [AuthController::class, 'login'])->name('login');
Route::post('/register', [AuthController::class, 'register'])->name('register');
// Education and resources
Route::get('/education-and-resource', [EducationAndResourceController::class, 'index'])->name('education-and-resource.index');
Route::get('/education-and-resource/{id}', [EducationAndResourceController::class, 'show'])->name('education-and-resource.show');
// rutas privadas
Route::middleware('auth:api')->group(function () {
    Route::post('/logout', [AuthController::class, 'logout'])->name('logout');
    // Education and resources
    Route::post('/education-and-resource', [EducationAndResourceController::class, 'store'])->name('education-and-resource.store');
    Route::put('/education-and-resource/{id}', [EducationAndResourceController::class, 'update'])->name('education-and-resource.update');
    Route::delete('/education-and-resource/{id}', [EducationAndResourceController::class, 'destroy'])->name('education-and-resource.destroy');

    //races
    Route::post('/races', [RaceController::class, 'store'])->name('races.store');
    Route::put('/races/{id}', [RaceController::class, 'update'])->name('races.update');
    Route::delete('/races/{id}', [RaceController::class, 'destroy'])->name('races.destroy');
});


// race routes
Route::get('/races', [RaceController::class, 'index'])->name('races.index');
Route::get('/races/{id}', [RaceController::class, 'show'])->name('races.show');