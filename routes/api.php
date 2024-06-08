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

Route::group(['namespace' => 'App\Http\Controllers\Api\Genre', 'prefix' => 'genres'], function () {
    Route::get('/', 'IndexController')->name('api.genre.index');
    Route::get('/{genre}', 'ShowController')->name('api.genre.show');
});

Route::group(['namespace' => 'App\Http\Controllers\Api\Film', 'prefix' => 'films'], function () {
    Route::get('/', 'IndexController')->name('api.film.index');
    Route::get('/{film}', 'ShowController')->name('api.film.show');
});


Route::middleware('auth:sanctum')->get('/user', function (Request $request) {
    return $request->user();
});



