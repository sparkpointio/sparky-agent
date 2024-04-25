<?php

use App\Http\Controllers\Admin\UserController;
use App\Http\Controllers\AuthenticationController;
use App\Http\Controllers\ContactController;
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

Route::middleware(['guest'])->group(function() {
    Route::post('/forgot-password', [AuthenticationController::class, 'forgotPassword'])->name('password.request');
    Route::get('/reset-password/{token}', [AuthenticationController::class, 'resetPasswordView'])->name('password.reset');
    Route::post('/reset-password', [AuthenticationController::class, 'resetPassword'])->name('password.update');

    Route::prefix('login')->group(function () {
        Route::get('/', [AuthenticationController::class, 'index'])->name('login.index');
        Route::post('/submit', [AuthenticationController::class, 'login'])->name('login.submit');
    });
});

Route::prefix('contact')->group(function () {
    Route::get('/', [ContactController::class, 'index'])->name('contact.index');
    Route::post('/subscribeEmail', [ContactController::class, 'subscribeEmail'])->name('contact.subscribeEmail');
    Route::post('/sendMessage', [ContactController::class, 'sendMessage'])->name('contact.sendMessage');
});

Route::middleware(['auth'])->group(function() {
    Route::get('/logout', [AuthenticationController::class, 'logout'])->name('logout.index');

    Route::middleware(['is_admin'])->group(function() {
        Route::prefix('admin')->group(function () {
            Route::resource('users', UserController::class)->names('admin.users');
        });
    });
});
