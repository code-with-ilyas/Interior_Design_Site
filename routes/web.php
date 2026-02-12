<?php

use App\Http\Controllers\Admin\QuoteController;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\ProfileController;
use App\Http\Controllers\Admin\AboutController;
use App\Http\Controllers\Admin\ServiceController;
use App\Http\Controllers\Admin\ServiceCategoryController;

use App\Http\Controllers\Admin\CustomerController;
use App\Http\Controllers\Admin\GalleryController;
use App\Http\Controllers\Admin\InstagramController;
use App\Http\Controllers\Admin\TestimonialController;
use App\Http\Controllers\Admin\SiteSettingController;
use App\Http\Controllers\Frontend\QuoteController as FrontendQuoteController;
use App\Http\Controllers\TermsAndConditionsController;
use App\Http\Controllers\PrivacyPolicyController;
use App\Http\Controllers\LegalNoticesController;
use App\Http\Controllers\BookingController;

use Illuminate\Support\Facades\Route;

Route::get('/', [HomeController::class, 'index'])->name('home');

// Contact form route
Route::post('/contact', [\App\Http\Controllers\ContactController::class, 'store'])
    ->name('contact.store');

Route::post('/request-demo', FrontendQuoteController::class)
    ->name('quotes.store');

// Project routes
Route::get('/projects', [App\Http\Controllers\ProjectController::class, 'index'])->name('projects.index');
Route::get('/projects/{project:slug}', [App\Http\Controllers\ProjectController::class, 'show'])->name('projects.show');

// Blog routes
Route::get('/blog', [\App\Http\Controllers\BlogController::class, 'index'])->name('blog.index');
Route::get('/blog/category/{category:slug}', [\App\Http\Controllers\BlogController::class, 'category'])->name('blog.category');
Route::get('/blog/{blog:slug}', [\App\Http\Controllers\BlogController::class, 'show'])->name('blog.show');

// Service routes
Route::get('/services', [\App\Http\Controllers\HomeController::class, 'servicesIndex'])->name('services.index');
Route::get('/services/{service:slug}', [\App\Http\Controllers\HomeController::class, 'showService'])->name('service.show');
Route::get('/services/category/{category}', [\App\Http\Controllers\HomeController::class, 'servicesByCategory'])->name('services.by.category');

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

    // Service image management routes
    Route::delete('/services/{service}/images/{image}', [\App\Http\Controllers\Admin\ServiceController::class, 'destroyImage'])->name('admin.services.images.destroy');

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

    // Contact management routes
    Route::get('/contacts', [\App\Http\Controllers\Admin\ContactController::class, 'index'])->name('admin.contacts.index');
    Route::get('/contacts/{contact}', [\App\Http\Controllers\Admin\ContactController::class, 'show'])->name('admin.contacts.show');
    Route::delete('/contacts/{contact}', [\App\Http\Controllers\Admin\ContactController::class, 'destroy'])->name('admin.contacts.destroy');

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

    // Service management routes
    Route::resource('services', \App\Http\Controllers\Admin\ServiceController::class)->names([
        'index' => 'admin.services.index',
        'create' => 'admin.services.create',
        'store' => 'admin.services.store',
        'show' => 'admin.services.show',
        'edit' => 'admin.services.edit',
        'update' => 'admin.services.update',
        'destroy' => 'admin.services.destroy',
    ]);

    // Service Category management routes
    Route::resource('service-categories', \App\Http\Controllers\Admin\ServiceCategoryController::class)->names([
        'index' => 'admin.service-categories.index',
        'create' => 'admin.service-categories.create',
        'store' => 'admin.service-categories.store',
        'show' => 'admin.service-categories.show',
        'edit' => 'admin.service-categories.edit',
        'update' => 'admin.service-categories.update',
        'destroy' => 'admin.service-categories.destroy',
    ]);

    // Service Images routes - temporarily disabled to use inline approach
    // Route::prefix('services/{service}/images')->name('admin.services.images.')->group(function () {
    //     Route::get('/', [ServiceImageController::class, 'index'])->name('index');
    //     Route::get('/create', [ServiceImageController::class, 'create'])->name('create');
    //     Route::post('/', [ServiceImageController::class, 'store'])->name('store');
    //     Route::get('/{serviceImage}', [ServiceImageController::class, 'show'])->name('show');
    //     Route::get('/{serviceImage}/edit', [ServiceImageController::class, 'edit'])->name('edit');
    //     Route::put('/{serviceImage}', [ServiceImageController::class, 'update'])->name('update');
    //     Route::delete('/{serviceImage}', [ServiceImageController::class, 'destroy'])->name('destroy');
    // });

    // Customer management routes
    Route::resource('customers', CustomerController::class)
        ->names('admin.customers');

    // Company management routes
    Route::resource('companies', \App\Http\Controllers\Admin\CompanyController::class)->names([
        'index' => 'admin.companies.index',
        'create' => 'admin.companies.create',
        'store' => 'admin.companies.store',
        'show' => 'admin.companies.show',
        'edit' => 'admin.companies.edit',
        'update' => 'admin.companies.update',
        'destroy' => 'admin.companies.destroy',
    ]);

    // Gallery management routes
    Route::resource('gallery', GalleryController::class)
        ->names('admin.gallery');

    // Gallery Category management routes
    Route::resource('gallery-categories', \App\Http\Controllers\Admin\GalleryCategoryController::class)
        ->names('admin.gallery-categories');

    // Instagram management routes
    Route::resource('instagram', InstagramController::class)
        ->names('admin.instagram');

    // Testimonial management routes
    Route::resource('testimonials', TestimonialController::class)
        ->names('admin.testimonials');

    // Site settings routes
    Route::get('site-settings', [SiteSettingController::class, 'index'])
        ->name('admin.site-settings.index');
    Route::put('site-settings', [SiteSettingController::class, 'update'])
        ->name('admin.site-settings.update');

    // Renovation Submission management routes
    Route::get('/renovation-submissions/export', [\App\Http\Controllers\Admin\RenovationSubmissionController::class, 'export'])
        ->name('admin.renovation-submissions.export');

    Route::resource('renovation-submissions', \App\Http\Controllers\Admin\RenovationSubmissionController::class)
        ->only(['index', 'show', 'update'])
        ->names([
            'index' => 'admin.renovation-submissions.index',
            'show' => 'admin.renovation-submissions.show',
            'update' => 'admin.renovation-submissions.update',
        ]);
});


// Dynamic Renovation System Routes
Route::prefix('renovate')->name('renovation.')->group(function () {
    // Intent selection
    Route::get('/', [\App\Http\Controllers\Frontend\RenovationController::class, 'showIntentSelection'])
        ->name('intent-selection');

    Route::post('/intent', [\App\Http\Controllers\Frontend\RenovationController::class, 'storeIntent'])
        ->name('store-intent');

    // Category selection
    Route::get('/select-category', [\App\Http\Controllers\Frontend\RenovationController::class, 'showCategorySelection'])
        ->name('category-selection');

    // Success page
    Route::get('/success', [\App\Http\Controllers\Frontend\RenovationController::class, 'showSuccess'])
        ->name('success');

    // Category-specific routes
    Route::prefix('{categorySlug}')->group(function () {
        // Show step (defaults to step 1 if not specified)
        Route::get('/{stepNumber?}', [\App\Http\Controllers\Frontend\RenovationController::class, 'showStep'])
            ->name('step')
            ->where('stepNumber', '[0-9]+');

        // Process step
        Route::post('/{stepNumber}', [\App\Http\Controllers\Frontend\RenovationController::class, 'processStep'])
            ->name('process-step')
            ->where('stepNumber', '[0-9]+');

        // Previous step navigation
        Route::get('/previous/{stepNumber}', [\App\Http\Controllers\Frontend\RenovationController::class, 'previousStep'])
            ->name('previous-step')
            ->where('stepNumber', '[0-9]+');

        // User info collection
        Route::get('/user-info', [\App\Http\Controllers\Frontend\RenovationController::class, 'showUserInfo'])
            ->name('user-info');

        // Final submission with rate limiting (5 per hour)
        Route::post('/submit', [\App\Http\Controllers\Frontend\RenovationController::class, 'submitForm'])
            ->name('submit')
            ->middleware('throttle:5,60');
    });
});

// Backward Compatibility Redirects
// Redirect old URLs to new dynamic renovation system format

// /renovation/step{number} → /renovate/complete-renovation/{number}
Route::redirect('/renovation/step1', '/renovate/complete-renovation/1', 301);
Route::redirect('/renovation/step2', '/renovate/complete-renovation/2', 301);
Route::redirect('/renovation/step3', '/renovate/complete-renovation/3', 301);
Route::redirect('/renovation/step4', '/renovate/complete-renovation/4', 301);
Route::redirect('/renovation/step5', '/renovate/complete-renovation/5', 301);
Route::redirect('/renovation/step6', '/renovate/complete-renovation/6', 301);
Route::redirect('/renovation/step7', '/renovate/complete-renovation/7', 301);
Route::redirect('/renovation/step8', '/renovate/complete-renovation/8', 301);

// /estimate/step{number} → /renovate/partial-renovation/{number}
Route::redirect('/estimate', '/renovate/partial-renovation/1', 301);
Route::redirect('/estimate/step1', '/renovate/partial-renovation/1', 301);
Route::redirect('/estimate/step2', '/renovate/partial-renovation/2', 301);
Route::redirect('/estimate/step3', '/renovate/partial-renovation/3', 301);
Route::redirect('/estimate/step4', '/renovate/partial-renovation/4', 301);
Route::redirect('/estimate/step5', '/renovate/partial-renovation/5', 301);
Route::redirect('/estimate/step6', '/renovate/partial-renovation/6', 301);
Route::redirect('/estimate/step7', '/renovate/partial-renovation/7', 301);
Route::redirect('/estimate/step8', '/renovate/partial-renovation/8', 301);
Route::redirect('/estimate/step9', '/renovate/partial-renovation/9', 301);
Route::redirect('/estimate/step10', '/renovate/partial-renovation/10', 301);
Route::redirect('/estimate/step11', '/renovate/partial-renovation/11', 301);
Route::redirect('/estimate/step12', '/renovate/partial-renovation/12', 301);
Route::redirect('/estimate/step13', '/renovate/partial-renovation/13', 301);
Route::redirect('/estimate/step14', '/renovate/partial-renovation/14', 301);

// /energy-renovation/step{number} → /renovate/energy-renovation/{number}
Route::redirect('/energy-renovation/step1', '/renovate/energy-renovation/1', 301);
Route::redirect('/energy-renovation/step2', '/renovate/energy-renovation/2', 301);

// /specific-works/step{number} → /renovate/small-specific-works/{number}
Route::redirect('/specific-works/step1', '/renovate/small-specific-works/1', 301);
Route::redirect('/specific-works/step2', '/renovate/small-specific-works/2', 301);
Route::redirect('/specific-works/step3', '/renovate/small-specific-works/3', 301);
Route::redirect('/specific-works/step4', '/renovate/small-specific-works/4', 301);
Route::redirect('/specific-works/step5', '/renovate/small-specific-works/5', 301);
Route::redirect('/specific-works/step6', '/renovate/small-specific-works/6', 301);
Route::redirect('/specific-works/step7', '/renovate/small-specific-works/7', 301);
Route::redirect('/specific-works/step8', '/renovate/small-specific-works/8', 301);

// /elevations/step{number} → /renovate/home-elevation/{number}
Route::redirect('/elevations/step1', '/renovate/home-elevation/1', 301);
Route::redirect('/elevations/step2', '/renovate/home-elevation/2', 301);
Route::redirect('/elevations/step3', '/renovate/home-elevation/3', 301);
Route::redirect('/elevations/step4', '/renovate/home-elevation/4', 301);
Route::redirect('/elevations/step5', '/renovate/home-elevation/5', 301);
Route::redirect('/elevations/step6', '/renovate/home-elevation/6', 301);
Route::redirect('/elevations/step7', '/renovate/home-elevation/7', 301);

// /extensions/step{number} → /renovate/home-extension/{number}
Route::redirect('/extensions/step1', '/renovate/home-extension/1', 301);
Route::redirect('/extensions/step2', '/renovate/home-extension/2', 301);
Route::redirect('/extensions/step3', '/renovate/home-extension/3', 301);
Route::redirect('/extensions/step4', '/renovate/home-extension/4', 301);
Route::redirect('/extensions/step5', '/renovate/home-extension/5', 301);
Route::redirect('/extensions/step6', '/renovate/home-extension/6', 301);
Route::redirect('/extensions/step7', '/renovate/home-extension/7', 301);

// Legal pages routes
Route::get('/terms-and-conditions', TermsAndConditionsController::class)->name('terms-and-conditions');
Route::get('/privacy-policy', PrivacyPolicyController::class)->name('privacy-policy');
Route::get('/legal-notices', LegalNoticesController::class)->name('legal-notices');

// Booking routes
Route::get('/book/{host}', [BookingController::class, 'index'])->name('booking.index');
Route::post('/book/calendar', [BookingController::class, 'calendar'])->name('booking.calendar');
Route::post('/book/slots', [BookingController::class, 'slots'])->name('booking.slots');
Route::post('/book/confirm', [BookingController::class, 'store'])->name('booking.store');

// API endpoint for available slots (as suggested in requirements)
Route::get('/api/available-slots', [BookingController::class, 'availableSlots'])->name('api.available-slots');

require __DIR__ . '/auth.php';
