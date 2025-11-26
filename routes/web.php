<?php

use App\Http\Controllers\ProfileController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\ServiceController;
use App\Http\Controllers\PaintController;
use App\Http\Controllers\ModelController;
use App\Http\Controllers\DesignController;



Route::get('/', function () {
    return view('welcome');
});

Route::get('/', function () {
    return view('home');
});


Route::get('/dashboard', function () {
    return view('dashboard');
})->middleware(['auth', 'verified'])->name('dashboard');

Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});





Route::get('/service-details', [ServiceController::class, 'details'])->name('service.details');
Route::get('/paints', [PaintController::class, 'paint'])->name('paints');
Route::get('/model', [ModelController::class, 'model'])->name('model');
Route::get('/design', [DesignController::class, 'design'])->name('design');

require __DIR__.'/auth.php';
