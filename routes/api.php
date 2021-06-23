<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\CategoryController;
use App\Http\Controllers\ItemController;

// Categories
Route::get('/categories', [CategoryController::class, 'index']);
Route::get('/categories/return/{categoryName}', [CategoryController::class, 'return']);
Route::post('/categories/store', [CategoryController::class, 'store']);
Route::delete('/categories/destroy/{categoryName}', [CategoryController::class, 'destroy']);

// Items
Route::get('/items', [ItemController::class, 'index']);
Route::post('/items/store', [ItemController::class, 'store']);
Route::put('/items/update/{item}', [ItemController::class, 'update']);
