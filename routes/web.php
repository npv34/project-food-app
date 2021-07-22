<?php

use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

Route::prefix('admin')->group(function () {
    Route::prefix('foods')->group(function (){
        Route::get('/', [\App\Http\Controllers\FoodController::class,'index'])->name('foods.index');
        Route::get('/create', [\App\Http\Controllers\FoodController::class,'create'])->name('foods.create');
    });
});

Route::get('/', function (){
    return view('admin.dashboard');
});
