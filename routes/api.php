<?php

use App\Http\Controllers\Api\CarsController;
use App\Http\Controllers\Api\UsersController;
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

Route::middleware('auth:sanctum')->get('/user', function (Request $request) {
    return $request->user();
});

Route::prefix('/users')->group(function () {
   Route::get('/', [UsersController::class, 'listAll']);
   Route::get('/{id}', [UsersController::class, 'findById']);
   Route::post('/', [UsersController::class, 'create']);
   Route::delete('/{id}', [UsersController::class, 'delete']);
});

Route::prefix('/cars')->group(function () {
    Route::post('/', [CarsController::class, 'create']);
    Route::delete('/', [CarsController::class, 'delete']);
});
