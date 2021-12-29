<?php

use App\Http\Controllers\PostController;
use App\Http\Controllers\UserController;
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

Route::get('/', function (){
   return redirect()->route('users.index');
});

Route::prefix('admin')->group(function () {

    Route::get('login', [\App\Http\Controllers\LoginController::class, 'showFormLogin'])->name('login');
    Route::post('login', [\App\Http\Controllers\LoginController::class, 'login'])->name('admin.login');

    Route::middleware(['auth','setLocal'])->group(function () {
        Route::prefix('foods')->group(function () {
            Route::get('/', [\App\Http\Controllers\FoodController::class, 'index'])->name('foods.index');
            Route::get('/create', [\App\Http\Controllers\FoodController::class, 'create'])->name('foods.create');
        });

        Route::prefix('users')->group(function () {
            Route::get('/', [UserController::class, 'index'])->name('users.index');
            Route::get('create', [UserController::class, 'create'])->name('users.create');
            Route::post('create', [UserController::class, 'store'])->name('users.store');
            Route::get('{id}/delete', [UserController::class, 'delete'])->name('users.delete');
        });

        Route::get('logout',[\App\Http\Controllers\LoginController::class,'logout'])->name('admin.logout');

        Route::get('/', function () {
            return view('admin.dashboard');
        });

        Route::prefix('posts')->group(function () {
            Route::get('/create', [PostController::class,'create'])->name('posts.create');
            Route::post('/create', [PostController::class,'store'])->name('posts.store');
            Route::get('/', [PostController::class,'index'])->name('posts.index');
        });

        Route::get('current-weather', [\App\Http\Controllers\WeatherController::class, 'showCurrentWeather'])->name('weather.showCurrentWeather');

        Route::post('change-language', [\App\Http\Controllers\LangController::class,'changeLanguage'])->name('admin.changeLanguage');
    });

});


