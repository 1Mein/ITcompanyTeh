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
Auth::routes();

Route::get('/', function () {
    return redirect()->route('home');
});


Route::group(['namespace' => 'App\Http\Controllers\Film', 'prefix' => 'films', 'middleware' => 'auth'], function () {
    Route::get('/', 'IndexController')->name('film.index');
    Route::get('/create', 'CreateController')->name('film.create');
    Route::post('/', 'StoreController')->name('film.store');
    Route::get('/{film}/edit', 'EditController')->name('film.edit');
    Route::put('/{film}', 'UpdateController')->name('film.update');
    Route::patch('/{film}/publish', 'PublishController')->name('film.publish');
    Route::delete('/{film}', 'DeleteController')->name('film.delete');
});

Route::group(['namespace' => 'App\Http\Controllers\Genre', 'prefix' => 'genres', 'middleware' => 'auth'], function () {
    Route::get('/', 'IndexController')->name('genre.index');
    Route::get('/create', 'CreateController')->name('genre.create');
    Route::post('/', 'StoreController')->name('genre.store');
    Route::get('/{genre}/edit', 'EditController')->name('genre.edit');
    Route::put('/{genre}', 'UpdateController')->name('genre.update');
    Route::delete('/{genre}', 'DeleteController')->name('genre.delete');
});



Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->middleware('auth')->name('home');
