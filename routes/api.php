<?php

use App\Http\Controllers\GenreController;
use App\Http\Controllers\MovieController;
use App\Http\Controllers\UserController;
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

Route::middleware('auth:sanctum')->get('/user', function (Request $request) {
    return $request->user();
});

// Route::get('/movies', [MovieController::class, 'index']);
Route::resource('/movies', MovieController::class);
// Route::get('/users', [UserController::class, 'index']);
Route::resource('/users', UserController::class);
Route::get('/genres', [GenreController::class, 'index']);
Route::resource('/movies/{id}', MovieController::class);