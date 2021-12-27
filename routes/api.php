<?php

use App\Http\Controllers\Api\RoleController;
use App\Http\Controllers\Api\UserController;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| is assigned the "api" middleware group. Enjoy building your API!
|
*/

Route::get('users', [UserController::class,'getAll']);
Route::post('users', [UserController::class,'store']);
Route::delete('users/{id}', [UserController::class, 'delete']);
Route::get('users/{id}', [UserController::class, 'findById']);
Route::put('users/{id}', [UserController::class, 'update']);


Route::prefix('roles')->group(function (){
    Route::get('', [RoleController::class, 'index']);
});
