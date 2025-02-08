<?php

use App\Http\Controllers\EmailSubscriptionController;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "api" middleware group. Make something great!
|
*/

//Route::middleware('auth:sanctum')->get('/user', function (Request $request) {
//    return $request->user();
//});

Route::resource('email-subscriptions', EmailSubscriptionController::class)->names('api.email-subscriptions');

Route::post('/storage/set', [StorageController::class, 'setItem']);
Route::get('/storage/get/{key}', [StorageController::class, 'getItem']);
Route::delete('/storage/remove/{key}', [StorageController::class, 'removeItem']);
