<?php

use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
*/

Route::get('/', function () {
    return "<p style='height: 100vh; font-family: sans-serif; display: flex; align-items: center; justify-content: center; font-size: x-large'>fullstack.otivo.test</p>";
});
