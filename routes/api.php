<?php

use App\Http\Controllers\Api\CarsController;
use App\Http\Controllers\Api\UsersController;
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

Route::prefix('/users')->group(function () {
   Route::get('/', [UsersController::class, 'listAll']);
   Route::get('/{id}', [UsersController::class, 'findById']);
   Route::get('/{id}/full', [UsersController::class, 'findByIdFull']);
   Route::post('/', [UsersController::class, 'create']);
   Route::delete('/{id}', [UsersController::class, 'delete']);
});

Route::prefix('/cars')->group(function () {
    Route::get('/{id}', [CarsController::class, 'getById']);
    Route::get('/{id}/full', [CarsController::class, 'getByIdFull']);
});
