<?php

use App\Http\Controllers\Admin\DashboardController;
use App\Http\Controllers\Admin\UserController;
use App\Http\Controllers\Auth\VerificationController;
use App\Http\Controllers\AuthenticationController;
use App\Http\Controllers\ContactController;
use App\Http\Controllers\Admin\EmailSubscriptionController;
use App\Http\Controllers\HomeController;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
*/

Route::get('/try', [HomeController::class, 'try']);

Route::get('/', [HomeController::class, 'index'])->name('home.index');
Route::get('under-construction', [HomeController::class, 'underConstruction'])->name('home.underConstruction');

Route::resource('email-subscriptions', EmailSubscriptionController::class);

Route::get('email/verify/{id}/{hash}', [VerificationController::class, 'verify'])->name('verification.verify');

Route::middleware(['guest'])->group(function() {
    Route::post('/forgot-password', [AuthenticationController::class, 'forgotPassword'])->name('password.request');
    Route::get('/reset-password/{token}', [AuthenticationController::class, 'resetPasswordView'])->name('password.reset');
    Route::post('/reset-password', [AuthenticationController::class, 'resetPassword'])->name('password.update');

    Route::prefix('login')->group(function () {
        Route::get('/', [AuthenticationController::class, 'index'])->name('login.index');
        Route::post('/submit', [AuthenticationController::class, 'login'])->name('login.submit');
    });

    Route::prefix('register')->group(function () {
        Route::get('/', [AuthenticationController::class, 'registerPage'])->name('register.index');
        Route::post('/submit', [AuthenticationController::class, 'register'])->name('register.submit');
    });
});

Route::prefix('contact')->group(function () {
    Route::get('/', [ContactController::class, 'index'])->name('contact.index');
    Route::post('/sendMessage', [ContactController::class, 'sendMessage'])->name('contact.sendMessage');
});

Route::middleware(['auth'])->group(function() {
    Route::get('/logout', [AuthenticationController::class, 'logout'])->name('logout.index');

    Route::prefix('email')->group(function () {
        Route::get('/verify', [VerificationController::class, 'show'])->name('verification.notice');
        Route::get('/resend', [VerificationController::class, 'resend'])->name('verification.resend');
    });

    Route::middleware(['is_admin'])->group(function() {
        Route::prefix('admin')->group(function () {
            Route::resource('/', DashboardController::class)->names('admin.dashboard');

            Route::prefix('users')->group(function () {
                Route::resource('/', UserController::class)->names('admin.users');
                Route::get('/export/excel', [UserController::class, 'exportExcel'])->name('admin.users.export-excel');
            });

            Route::prefix('email-subscriptions')->group(function () {
                Route::resource('/', EmailSubscriptionController::class)->names('admin.email-subscriptions');
                Route::get('/export/excel', [EmailSubscriptionController::class, 'exportExcel'])->name('admin.email-subscriptions.export-excel');
            });
        });
    });
});
