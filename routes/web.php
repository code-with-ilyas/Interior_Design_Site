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


use Illuminate\Support\Facades\Route;

Route::get('/', [HomeController::class, 'index'])->name('home');




// Project routes
Route::get('/projects', [App\Http\Controllers\ProjectController::class, 'index'])->name('projects.index');
Route::get('/projects/{project:slug}', [App\Http\Controllers\ProjectController::class, 'show'])->name('projects.show');

// Blog routes
Route::get('/blog', [\App\Http\Controllers\BlogController::class, 'index'])->name('blog.index');
Route::get('/blog/category/{category:slug}', [\App\Http\Controllers\BlogController::class, 'category'])->name('blog.category');
Route::get('/blog/{blog:slug}', [\App\Http\Controllers\BlogController::class, 'show'])->name('blog.show');

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

    // Blog management routes
    Route::resource('blog-categories', \App\Http\Controllers\Admin\BlogCategoryController::class)->names([
        'index' => 'admin.blog-categories.index',
        'create' => 'admin.blog-categories.create',
        'store' => 'admin.blog-categories.store',
        'show' => 'admin.blog-categories.show',
        'edit' => 'admin.blog-categories.edit',
        'update' => 'admin.blog-categories.update',
        'destroy' => 'admin.blog-categories.destroy',
    ]);

    Route::resource('blog-posts', \App\Http\Controllers\Admin\BlogPostController::class)->names([
        'index' => 'admin.blog-posts.index',
        'create' => 'admin.blog-posts.create',
        'store' => 'admin.blog-posts.store',
        'show' => 'admin.blog-posts.show',
        'edit' => 'admin.blog-posts.edit',
        'update' => 'admin.blog-posts.update',
        'destroy' => 'admin.blog-posts.destroy',
    ]);

    // Blog Post Images management routes
    Route::prefix('blog-posts/{blog_post}')->group(function () {
        Route::resource('images', \App\Http\Controllers\Admin\BlogPostImageController::class)->names([
            'index' => 'admin.blog-posts.images.index',
            'create' => 'admin.blog-posts.images.create',
            'store' => 'admin.blog-posts.images.store',
            'show' => 'admin.blog-posts.images.show',
            'edit' => 'admin.blog-posts.images.edit',
            'update' => 'admin.blog-posts.images.update',
            'destroy' => 'admin.blog-posts.images.destroy',
        ]);
    });
});



Route::resource('admin/about', AboutController::class)
    ->names('admin.about');

Route::resource('admin/services', ServiceController::class)
    ->names('admin.services');


Route::resource('admin/customers', CustomerController::class)
    ->names('admin.customers');

Route::resource('admin/companies', \App\Http\Controllers\Admin\CompanyController::class)->names([
        'index' => 'admin.companies.index',
        'create' => 'admin.companies.create',
        'store' => 'admin.companies.store',
        'show' => 'admin.companies.show',
        'edit' => 'admin.companies.edit',
        'update' => 'admin.companies.update',
        'destroy' => 'admin.companies.destroy',
    ]);

Route::resource('admin/gallery', GalleryController::class)
    ->names('admin.gallery');

Route::resource('admin/instagram', InstagramController::class)
    ->names('admin.instagram');


Route::resource('admin/testimonials', TestimonialController::class)
    ->names('admin.testimonials');

Route::get('/renovate', function () {
    return view('multi-forms');
})->name('renovate');

Route::prefix('estimate')->name('estimate.')->group(function () {
    Route::view('/', 'estimates.step1')->name('step1');
    Route::view('step2', 'estimates.step2')->name('step2');
    Route::view('step3', 'estimates.step3')->name('step3');
    Route::view('step4', 'estimates.step4')->name('step4');
    Route::view('step5', 'estimates.step5')->name('step5');
    Route::view('step6', 'estimates.step6')->name('step6');
    Route::view('step7', 'estimates.step7')->name('step7');
    Route::view('step8', 'estimates.step8')->name('step8');
    Route::view('step9', 'estimates.step9')->name('step9');
    Route::view('step10', 'estimates.step10')->name('step10');
    Route::view('step11', 'estimates.step11')->name('step11');
    Route::view('step12', 'estimates.step12')->name('step12');
    Route::view('step13', 'estimates.step13')->name('step13');
    Route::view('step14', 'estimates.step14')->name('step14');
});

Route::prefix('renovation')->name('renovation.')->group(function () {
    Route::view('step1', 'renovation.step1')->name('step1');
    Route::view('step2', 'renovation.step2')->name('step2');
    Route::view('step3', 'renovation.step3')->name('step3');
    Route::view('step4', 'renovation.step4')->name('step4');
    Route::view('step5', 'renovation.step5')->name('step5');
    Route::view('step6', 'renovation.step6')->name('step6');
    Route::view('step7', 'renovation.step7')->name('step7');
    Route::view('step8', 'renovation.step8')->name('step8');
});

Route::prefix('energy-renovation')->name('energy-renovation.')->group(function () {
    Route::view('step1', 'energy-renovation.step1')->name('step1');
    Route::view('step2', 'energy-renovation.step2')->name('step2');
});

Route::prefix('specific-works')->name('specific-works.')->group(function () {
    Route::view('step1', 'specific-works.step1')->name('step1');
    Route::view('step2', 'specific-works.step2')->name('step2');
    Route::view('step3', 'specific-works.step3')->name('step3');
    Route::view('step4', 'specific-works.step4')->name('step4');
    Route::view('step5', 'specific-works.step5')->name('step5');
    Route::view('step6', 'specific-works.step6')->name('step6');
    Route::view('step7', 'specific-works.step7')->name('step7');
    Route::view('step8', 'specific-works.step8')->name('step8');
});

Route::prefix('elevations')->name('elevations.')->group(function () {
    Route::view('step1', 'elevations.step1')->name('step1');
    Route::view('step2', 'elevations.step2')->name('step2');
    Route::view('step3', 'elevations.step3')->name('step3');
    Route::view('step4', 'elevations.step4')->name('step4');
    Route::view('step5', 'elevations.step5')->name('step5');
    Route::view('step6', 'elevations.step6')->name('step6');
    Route::view('step7', 'elevations.step7')->name('step7');

});


Route::prefix('extensions')->name('extensions.')->group(function () {
    Route::view('step1', 'extensions.step1')->name('step1');
    Route::view('step2', 'extensions.step2')->name('step2');
    Route::view('step3', 'extensions.step3')->name('step3');
    Route::view('step4', 'extensions.step4')->name('step4');
    Route::view('step5', 'extensions.step5')->name('step5');
    Route::view('step6', 'extensions.step6')->name('step6');
    Route::view('step7', 'extensions.step7')->name('step7');

});

require __DIR__ . '/auth.php';
