<?php

use App\Http\Controllers\API\AuthController;
use App\Http\Controllers\GenreController;
use App\Http\Controllers\MovieController;
use App\Http\Controllers\UserController;
use App\Http\Controllers\UserMovieController;
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
Route::resource('movies', MovieController::class);
// Route::get('/users', [UserController::class, 'index']);
Route::resource('users', UserController::class);
Route::get('/genres', [GenreController::class, 'index']);
Route::get('/users/{id}/movies', [UserMovieController::class, 'index'])->name('users.movies.index');
// Route::resource('/movies/{id}', MovieController::class);

Route::post('/register', [AuthController::class, 'register']);
Route::post('/login', [AuthController::class, 'login']);
// Route::post('/logout', [AuthController::class, 'logout']);

Route::group(['middleware' => ['auth:sanctum']], function () {
    Route::get('/profile', function (request $request) {
        return auth()->user();
    });
    Route::resource('movies', MovieController::class)->only(['update', 'store', 'destroy']);
    Route::post('/logout', [AuthController::class, 'logout']);
});
// Route::resource('movies', MovieController::class)->only(['index']);

