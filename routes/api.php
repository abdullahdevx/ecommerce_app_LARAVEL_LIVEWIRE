<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\authApiController;
use App\Http\Controllers\dataApiController;
use App\Http\Controllers\adminApiController;

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
//Authentication Routes
Route::post('/register' ,[authApiController::class, 'registerUser']);
Route::post('/login' ,[authApiController::class, 'login']);

//Admin Routes with isAdmin Middleware
Route::middleware(['auth:sanctum', 'isAdmin'])->group( function() {
    Route::get('/admin/products',[adminApiController::class, 'getProducts']);
    Route::delete('/admin/remove', [adminApiController::class, 'removeProduct{id}']);
    Route::post('/admin/add', [adminApiController::class, 'addProduct']);
    Route::put('/admin/updateproduct', [adminApiController::class, 'updateProduct{id}']);
});

//Protected routes
Route::middleware(['auth:sanctum'])->group( function() {
    Route::post('/logout' ,[authApiController::class, 'logout']);
    Route::get('/cart' ,[dataApiController::class, 'getUserCartItems']);
    //Cart Operations
    Route::post('/decreasequantity' ,[dataApiController::class, 'decreaseQuantity{id}']);
    Route::post('/increasequantity' ,[dataApiController::class, 'increaseQuantity{id}']);
    Route::delete('/removeproduct' ,[dataApiController::class, 'removeProduct{id}']);    
    Route::get('/cart' ,[dataApiController::class, 'getUserCartItems']);
});

Route::get('/products', [dataApiController::class, 'getProducts']);
Route::post('/addtocart' ,[dataApiController::class, 'addToCart{id}']);




Route::middleware('auth:api')->get('/user', function (Request $request) {
    return $request->user();
});

// Route::group(['middleware' => ['auth:sanctum']], function() {
    