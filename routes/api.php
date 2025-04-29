<?php

use App\Http\Controllers\Api\LevelController;
use App\Http\Controllers\Api\LoginController;
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

// Routes for Register
Route::post('/register', App\Http\Controllers\Api\RegisterController::class)->name('register');

// Routes login
Route::post('/login', App\Http\Controllers\Api\LoginController::class)->name('login');

// Routes logout
Route::post('/logout', App\Http\Controllers\Api\LogoutController::class)->name('logout');

// Routes level
Route::get('/levels', [LevelController::class, 'index']);
Route::post('/levels', [LevelController::class, 'store']);
Route::get('/levels/{level}', [LevelController::class, 'show']);
Route::put('/levels/{level}', [LevelController::class, 'update']);
Route::delete('/levels/{level}', [LevelController::class, 'destroy']);

Route::middleware('auth:api')->get('/user', function (Request $request) {
    return response()->json([
        'success' => true,
        'user' => $request->user()
    ]);
});
