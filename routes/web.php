<?php

use App\Http\Controllers\ProfileController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Admin\UsersController;
use App\Http\Controllers\Admin\RoleController;
use App\Http\Controllers\Admin\PermissionController;
use App\Http\Controllers\Admin\HomeController;
use App\Http\Controllers\Admin\CountryController;
use App\Http\Controllers\Admin\CurrencyController;
use App\Http\Controllers\Admin\StoreTypeController;
use App\Http\Controllers\Admin\PlanController;
use App\Http\Controllers\Admin\TemplateController;
use App\Http\Controllers\Customer\MessageTemplateController;
use App\Http\Controllers\Customer\ContactController;
use App\Http\Controllers\Customer\MailProviderController;
use App\Http\Controllers\Customer\TemplateController as CustomerTemplateController;
use App\Http\Controllers\Customer\MessageController;
use Mcamara\LaravelLocalization\Facades\LaravelLocalization;

Route::get('/', function () {
    return view('welcome');
});

Route::group(['prefix' => LaravelLocalization::setLocale()], function () {

    Route::get('/dashboard', function () {
        return view('dashboard');
    })->middleware(['auth', 'verified'])->name('dashboard');

    // Customer Routes
    Route::middleware('auth')->prefix('customer')->as('customer.')->group(function () {
        Route::resource('contacts', ContactController::class);
        Route::resource('mail_providers', MailProviderController::class);
        Route::resource('message_templates', MessageTemplateController::class);

        Route::resource('templates', CustomerTemplateController::class)
            ->only(['index', 'show']);

        Route::get(
            'templates/{template}/preview',
            [CustomerTemplateController::class, 'preview']
        )->name('templates.preview');

        Route::resource('messages', MessageController::class);

        Route::get(
            'messages/{message}/preview',
            [MessageController::class, 'preview']
        )->name('messages.preview');
    });

    // Profile Routes
    Route::middleware('auth')->prefix('profile')->as('profile.')->group(function () {
        Route::get('/', [ProfileController::class, 'edit'])->name('edit');
        Route::patch('/', [ProfileController::class, 'update'])->name('update');
        Route::delete('/', [ProfileController::class, 'destroy'])->name('destroy');

        // START MEDIA
        Route::post('/media', [ProfileController::class, 'storeMedia'])->name('storeMedia');
        Route::get('/media/{media_uuid}/{size?}', [ProfileController::class, 'showMedia'])->name('showMedia');
        // END MEDIA
    });

    // Admin Routes
    Route::middleware('auth')->prefix('admin')->as('admin.')->group(function () {
        Route::get('/', [HomeController::class, 'index'])->name('home');

        // Role management
        Route::resource('roles', RoleController::class);

        // Permission management
        Route::resource('permissions', PermissionController::class);

        // User management
        Route::resource('users', UsersController::class)->parameters(['users' => 'user:slug']);
        Route::put('/users/{user:slug}/update-password', [UsersController::class, 'updatePassword'])->name('users.update-password');

        // Countries
        Route::resource('countries', CountryController::class);

        // Currencies
        Route::resource('currencies', CurrencyController::class);

        // Store Types
        Route::resource('store_types', StoreTypeController::class);

        // Plans
        Route::resource('plans', PlanController::class);

        // Templates
        Route::resource('templates', TemplateController::class);

        // Admin Message Templates (disabled for now)
        // Route::resource('message_templates', MessageTemplateController::class);
    });

    require __DIR__ . '/auth.php';
});