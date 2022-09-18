<?php

use App\Http\Controllers\AuthController;
use App\Http\Controllers\CommandController;
use App\Http\Controllers\ProductController;
use App\Http\Controllers\CategorieController;

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

Route::post('/register', [AuthController::class, 'register']);
Route::post('/login', [AuthController::class, 'login']);
Route::post('/me', [AuthController::class, 'me'])->middleware('auth:sanctum');
Route::get('products/filter', [ProductController::class,"filter"]);
Route::resource('/users', UserController::class);

Route::middleware('api')->group(function () {
    Route::resource('products', ProductController::class);
});


Route::middleware('api')->group(function () {
    Route::resource('categories', CategorieController::class);
});
Route::middleware('api')->group(function () {
    Route::resource('commandes', CommandController::class);
});

Route::middleware('api')->group(function () {
    Route::resource('carts', \App\Http\Controllers\CartController::class);
});
