<?php

use App\Http\Controllers\ErrorController;
use App\Http\Controllers\SeriesController;
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

Route::get('/', function () {
    return redirect('/series');
});

Route::controller(SeriesController::class)->group(function () {
    Route::get('/series', 'index')->name('series.index');
    Route::get('/series/create', 'create')->name('series.create');
    Route::post('/series/store', 'store')->name('series.store');
    Route::post('/series/destroy/{serieId}', 'destroy')->name('series.destroy')->whereNumber('id');
});

Route::controller(ErrorController::class)->group(function () {
    Route::get('/errors/404', 'notFound')->name('errors.notfound');
});

