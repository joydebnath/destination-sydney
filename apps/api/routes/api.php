<?php

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

Route::get('/areas', [App\Http\Controllers\AreasController::class, 'index']);
Route::get('/regions', [App\Http\Controllers\RegionsController::class, 'index']);
Route::get('/suburbs', [App\Http\Controllers\SuburbsController::class, 'index']);
Route::get('/locations', [App\Http\Controllers\LocationController::class, 'index']);
