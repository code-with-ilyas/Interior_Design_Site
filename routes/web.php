<?php

use App\Http\Controllers\Admin\QuoteController;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\ProfileController;
use App\Http\Controllers\Admin\AboutController;
use App\Http\Controllers\Admin\ServiceController;
use App\Http\Controllers\Admin\CustomerController;
use App\Http\Controllers\Admin\GalleryController;
use App\Http\Controllers\Admin\InstagramController;
use App\Http\Controllers\Admin\TestimonialController;
use App\Http\Controllers\Admin\SiteSettingController;


use Illuminate\Support\Facades\Route;

Route::get('/', [HomeController::class, 'index'])->name('home');




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

    // Expert Category management routes
    Route::resource('expert-categories', \App\Http\Controllers\Admin\ExpertCategoryController::class)->names([
        'index' => 'admin.expert-categories.index',
        'create' => 'admin.expert-categories.create',
        'store' => 'admin.expert-categories.store',
        'show' => 'admin.expert-categories.show',
        'edit' => 'admin.expert-categories.edit',
        'update' => 'admin.expert-categories.update',
        'destroy' => 'admin.expert-categories.destroy',
    ]);

    // Project management routes
    Route::resource('projects', \App\Http\Controllers\Admin\ProjectController::class)->names([
        'index' => 'admin.projects.index',
        'create' => 'admin.projects.create',
        'store' => 'admin.projects.store',
        'show' => 'admin.projects.show',
        'edit' => 'admin.projects.edit',
        'update' => 'admin.projects.update',
        'destroy' => 'admin.projects.destroy',
    ]);

    // Project image management routes
    Route::delete('/projects/{project}/images/{image}', [\App\Http\Controllers\Admin\ProjectController::class, 'destroyImage'])->name('admin.projects.images.destroy');

    // Project Category management routes
    Route::resource('project-categories', \App\Http\Controllers\Admin\ProjectCategoryController::class)->names([
        'index' => 'admin.project-categories.index',
        'create' => 'admin.project-categories.create',
        'store' => 'admin.project-categories.store',
        'show' => 'admin.project-categories.show',
        'edit' => 'admin.project-categories.edit',
        'update' => 'admin.project-categories.update',
        'destroy' => 'admin.project-categories.destroy',
    ]);

    // Quote management routes
    Route::get('/quotes', [QuoteController::class, 'index'])->name('admin.quotes.index');
    Route::post('/quotes', [QuoteController::class, 'store'])->name('admin.quotes.store');
    Route::get('/quotes/pending', [QuoteController::class, 'pending'])->name('admin.quotes.pending');
    Route::get('/quotes/approved', [QuoteController::class, 'approved'])->name('admin.quotes.approved');
    Route::get('/quotes/rejected', [QuoteController::class, 'rejected'])->name('admin.quotes.rejected');
    Route::get('/quotes/{quote}', [QuoteController::class, 'show'])->name('admin.quotes.show');
    Route::post('/quotes/{quote}/approve', [QuoteController::class, 'approve'])->name('admin.quotes.approve');
    Route::post('/quotes/{quote}/reject', [QuoteController::class, 'reject'])->name('admin.quotes.reject');

    // Permission management routes
    Route::resource('permissions', \App\Http\Controllers\Admin\PermissionController::class)->names([
        'index' => 'admin.permissions.index',
        'create' => 'admin.permissions.create',
        'store' => 'admin.permissions.store',
        'show' => 'admin.permissions.show',
        'edit' => 'admin.permissions.edit',
        'update' => 'admin.permissions.update',
        'destroy' => 'admin.permissions.destroy',
    ])->except(['show']);

    Route::post('/permissions/assign-to-role', [\App\Http\Controllers\Admin\PermissionController::class, 'assignToRole'])->name('admin.permissions.assign-to-role');
    Route::post('/permissions/assign-to-user', [\App\Http\Controllers\Admin\PermissionController::class, 'assignToUser'])->name('admin.permissions.assign-to-user');
    Route::get('/permissions/user-permissions', [\App\Http\Controllers\Admin\PermissionController::class, 'getUserPermissions'])->name('admin.permissions.user-permissions');
    Route::get('/permissions/role-permissions', [\App\Http\Controllers\Admin\PermissionController::class, 'getRolePermissions'])->name('admin.permissions.role-permissions');
});



Route::resource('admin/about', AboutController::class)
    ->names('admin.about');

Route::resource('admin/services', ServiceController::class)
    ->names('admin.services');


Route::resource('admin/customers', CustomerController::class)
    ->names('admin.customers');

Route::resource('admin/gallery', GalleryController::class)
    ->names('admin.gallery');

Route::resource('admin/instagram', InstagramController::class)
    ->names('admin.instagram');


Route::resource('admin/testimonials', TestimonialController::class)
    ->names('admin.testimonials');
    
Route::prefix('admin')->name('admin.')->group(function () {
    Route::get('site-settings/edit', [SiteSettingController::class, 'edit'])->name('site-settings.edit');
    Route::put('site-settings/update', [SiteSettingController::class, 'update'])->name('site-settings.update');
});


require __DIR__ . '/auth.php';
