<?php

use App\Http\Controllers\ProfileController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\ServiceController;
use App\Http\Controllers\PaintController;
use App\Http\Controllers\ModelController;
use App\Http\Controllers\DesignController;
use App\Http\Controllers\Project1Controller;
use App\Http\Controllers\Project2Controller;
use App\Http\Controllers\Project3Controller;
use App\Http\Controllers\BlogController;
use App\Http\Controllers\BlagController;



Route::get('/', function () {
    return view('welcome');
});

Route::get('/', function () {
    return view('home');
});


Route::get('/gallery', function () {
    return view('gallery'); 
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




Route::get('/project1', [Project1Controller::class, 'index'])->name('project1');
Route::get('/project2', [Project2Controller::class, 'index'])->name('project2');
Route::get('/project3', [Project3Controller::class, 'index'])->name('project3');



Route::get('/blog', [BlogController::class, 'index'])->name('blog.index');
Route::get('/blag', [BlagController::class, 'index'])->name('blag.index');


require __DIR__.'/auth.php';
