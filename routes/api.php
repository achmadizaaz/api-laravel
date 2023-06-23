<?php

use App\Http\Controllers\Api\PostController;
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


// API POST
Route::get('/posts', [PostController::class, 'index']);
Route::post('/posts', [PostController::class, 'store']);
Route::get('/posts/{post:slug}/show', [PostController::class, 'show']);
Route::put('/posts/{post}/update', [PostController::class, 'update']);
Route::delete('/posts/{post}/delete', [PostController::class, 'destroy']);

// Recommended route with "apiResource", is very simple and clean code in your route API
// Route::apiResource('posts', PostController::class);