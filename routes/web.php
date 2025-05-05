<?php

use App\Http\Controllers\Admin\DashboardController;
use App\Http\Controllers\Admin\UserController;
use App\Http\Controllers\Auth\VerificationController;
use App\Http\Controllers\AuthenticationController;
use App\Http\Controllers\ContactController;
use App\Http\Controllers\Admin\EmailSubscriptionController as AdminEmailSubscriptionController;
use App\Http\Controllers\EmailSubscriptionController;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\ProfileController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Admin\BlogController as AdminBlogController;
use App\Http\Controllers\BlogController;

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
Route::get('/nft-pass', [HomeController::class, 'nftPass'])->name('nftPass.index');
Route::get('under-construction', [HomeController::class, 'underConstruction'])->name('home.underConstruction');

Route::resource('email-subscriptions', EmailSubscriptionController::class);

Route::get('email/verify/{id}/{hash}', [VerificationController::class, 'verify'])->name('verification.verify');
Route::post('register/search-address', [AuthenticationController::class, 'searchAddress'])->name('register.search-address');

Route::prefix('blog')->group(function () {
    Route::get('/', [BlogController::class, 'index'])->name('blog.index');
    Route::get('/{content}', [BlogController::class, 'content'])->name('blog.content');
});

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

    Route::prefix('profile')->group(function () {
        Route::get('/', [ProfileController::class, 'index'])->name('profile.index');
        Route::post('/update', [ProfileController::class, 'update'])->name('profile.update');
        Route::post('/update/photo', [ProfileController::class, 'updatePhoto'])->name('profile.update-photo');
        Route::post('/update/valid-id', [ProfileController::class, 'updateValidID'])->name('profile.update-valid-id');
    });

    Route::middleware(['verified'])->group(function() {

    });

    Route::middleware(['is_admin'])->group(function() {
        Route::prefix('admin')->group(function () {
            Route::resource('/', DashboardController::class)->names('admin.dashboard');

            Route::prefix('users')->group(function () {
                Route::resource('/', UserController::class)->names('admin.users');
                Route::get('/export/excel', [UserController::class, 'exportExcel'])->name('admin.users.export-excel');
            });

            Route::prefix('email-subscriptions')->group(function () {
                Route::resource('/', AdminEmailSubscriptionController::class)->names('admin.email-subscriptions');
                Route::get('/export/excel', [AdminEmailSubscriptionController::class, 'exportExcel'])->name('admin.email-subscriptions.export-excel');
            });

            Route::prefix('blogs')->group(function () {
                Route::get('/', [AdminBlogController::class, 'index'])->name('admin.blogs.index');
                Route::get('/create', [AdminBlogController::class, 'create'])->name('admin.blogs.create');
                Route::post('/store', [AdminBlogController::class, 'store'])->name('admin.blogs.store');
                Route::get('/{id}/edit', [AdminBlogController::class, 'edit'])->name('admin.blogs.edit');
                Route::post('/{id}/update', [AdminBlogController::class, 'update'])->name('admin.blogs.update');
            });
        });
    });
});
