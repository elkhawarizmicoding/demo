<?php

use App\Http\Controllers\CategoryController;
use App\Http\Controllers\ProductController;
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

//Category
Route::get('categories', [CategoryController::class, 'index']);
Route::post('category/store', [CategoryController::class, 'store']);
Route::post('category/update', [CategoryController::class, 'update']);
Route::post('category/delete', [CategoryController::class, 'delete']);
Route::get('category/{id}', [CategoryController::class, 'getById']);

//Product
Route::get('products', [ProductController::class, 'index']);
Route::post('product/store', [ProductController::class, 'store']);
Route::post('product/update', [ProductController::class, 'update']);
Route::post('product/delete', [ProductController::class, 'delete']);
Route::get('product/{id}', [ProductController::class, 'getById']);
