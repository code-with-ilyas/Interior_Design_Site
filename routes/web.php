<?php

use App\Http\Controllers\Admin\QuoteController;
use App\Http\Controllers\ProfileController;
use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('home');
})->name('home');

// Project routes
Route::get('/project/1', function () {
    return view('project1');
})->name('project1');

Route::get('/project/2', function () {
    return view('project2');
})->name('project2');

Route::get('/project/3', function () {
    return view('project3');
})->name('project3');

// Blog routes
Route::get('/blog', function () {
    return view('blog');
})->name('blog.index');

Route::get('/gallery', function () {
    return view('gallery');
});


Route::get('/dashboard', function () {
    return view('dashboard');
})->middleware(['auth', 'verified', 'not.super.admin'])->name('dashboard');

Route::middleware(['auth', 'verified'])->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});

// Admin routes
Route::middleware(['auth', 'verified', 'super.admin'])->prefix('admin')->group(function () {
    Route::get('/dashboard', function () {
        return view('admin.dashboard');
    })->name('admin.dashboard');

    // Expert management routes
    Route::resource('experts', \App\Http\Controllers\Admin\ExpertController::class)->names([
        'index' => 'admin.experts.index',
        'create' => 'admin.experts.create',
        'store' => 'admin.experts.store',
        'show' => 'admin.experts.show',
        'edit' => 'admin.experts.edit',
        'update' => 'admin.experts.update',
        'destroy' => 'admin.experts.destroy',
    ]);

    // Skill management routes
    Route::resource('skills', \App\Http\Controllers\Admin\SkillController::class)->names([
        'index' => 'admin.skills.index',
        'create' => 'admin.skills.create',
        'store' => 'admin.skills.store',
        'show' => 'admin.skills.show',
        'edit' => 'admin.skills.edit',
        'update' => 'admin.skills.update',
        'destroy' => 'admin.skills.destroy',
    ]);

    // Quote management routes
    Route::get('/quotes', [QuoteController::class, 'index'])->name('admin.quotes.index');
    Route::get('/quotes/pending', [QuoteController::class, 'pending'])->name('admin.quotes.pending');
    Route::get('/quotes/approved', [QuoteController::class, 'approved'])->name('admin.quotes.approved');
    Route::get('/quotes/rejected', [QuoteController::class, 'rejected'])->name('admin.quotes.rejected');
    Route::get('/quotes/{quote}', [QuoteController::class, 'show'])->name('admin.quotes.show');
    Route::post('/quotes/{quote}/approve', [QuoteController::class, 'approve'])->name('admin.quotes.approve');
    Route::post('/quotes/{quote}/reject', [QuoteController::class, 'reject'])->name('admin.quotes.reject');
});

require __DIR__.'/auth.php';
