<?php

//Login
use App\Http\Controllers\Api\AuthController;
Route::post('/login', [AuthController::class, 'login']);

// Items
use App\Http\Controllers\Api\ItemController;
Route::middleware('auth:sanctum')->get('/items', [ItemController::class, 'index']);

// Users
use App\Http\Controllers\Api\UserController;
Route::middleware('auth:sanctum')->get('/users', [UserController::class, 'index']);

// Stock Opname
use App\Http\Controllers\Api\StockOpnameController;
Route::middleware('auth:sanctum')->group(function () {
    Route::post('/stock-opname', [StockOpnameController::class, 'store']);
});



