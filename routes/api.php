<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Api\AuthController;
use App\Http\Controllers\Api\ContactController;
use App\Http\Controllers\Api\MailProviderController;
use App\Http\Controllers\Api\MessageTemplateController;
use App\Http\Controllers\Api\TemplateController;
use App\Http\Controllers\Api\MessagePreviewController;
use App\Http\Controllers\Api\TemplatePreviewController;

// PUBLIC ROUTES
Route::post('/login', [AuthController::class, 'login']);
Route::post('/register', [AuthController::class, 'register']);

Route::post('/forgot-password', [AuthController::class, 'forgotPassword']);

Route::post('/otp/request', [AuthController::class, 'sendOtp']);
Route::post('/otp/verify', [AuthController::class, 'verifyOtp']);

// AUTHENTICATED ROUTES
Route::middleware('auth:sanctum')->group(function () {
    Route::apiResource('contacts', ContactController::class);
    Route::apiResource('mail-providers', MailProviderController::class);
    Route::apiResource('message-templates', MessageTemplateController::class);

    Route::get('templates', [TemplateController::class, 'index']);

    Route::get('/messages/{id}/preview', [MessagePreviewController::class, 'preview']);
    Route::get('/templates/{id}/preview', [TemplatePreviewController::class, 'preview']);

    Route::get('/user', [AuthController::class, 'user']);
    Route::put('/profile', [AuthController::class, 'updateProfile']);
    Route::post('/logout', [AuthController::class, 'logout']);
});
