<?php

use App\Http\Controllers\AuthController;
use App\Http\Controllers\NumberController;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| is assigned the "api" middleware group. Enjoy building your API!
|
*/

/*
 * Public routs
 */
Route::post('/register', [AuthController::class, 'register'])->name('register');
Route::post('/login', [AuthController::class, 'logIn'])->name('login');

/**
 * Protected routs
 */
Route::middleware('auth:sanctum')->group( function () {
    Route::post('/generate', [NumberController::class, 'store'])->name('generate.number');
    Route::get('/retrieve/{number}', [NumberController::class, 'show'])->name('retrieve.number');
    Route::post('/logout', [AuthController::class, 'logOut'])->name('logout');
});
