<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Cars\CarsController;
use App\Http\Controllers\Orders\OrdersController;
use App\Http\Controllers\Authentication\AuthController;

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

Route::middleware('auth:sanctum')->get('/user', function (Request $request) {
    return $request->user();
});

//testing saja
Route::get('/greeting', function () {
    return 'Hello World';
});
//versi lama
Route::get('cars-all', 'CarsController@index');

//dipake Cars
Route::get('/cars', [CarsController::class, 'index']);
Route::get('/cars/{id}', [CarsController::class, 'show']);
Route::post('/cars-update/{id}', [CarsController::class, 'update']);
Route::post('/cars-created', [CarsController::class, 'store']);
Route::delete('/cars-remove/{id}', [CarsController::class, 'destroy']);

//Orders
Route::get('/orders', [OrdersController::class, 'index']);
Route::get('/orders/{id}', [OrdersController::class, 'show']);
Route::post('/orders-update/{id}', [OrdersController::class, 'update']);
Route::post('/orders-created', [OrdersController::class, 'store']);
Route::delete('/orders-remove/{id}', [OrdersController::class, 'destroy']);

//Authentikasi
Route::namespace('Auth')->group(function(){
    // Route::post('register', 'RegisterController');
    Route::post('/register', [AuthController::class, 'register']);
    // Route::post('login', 'LoginController');
    // Route::post('logout', 'LogoutController');
});

