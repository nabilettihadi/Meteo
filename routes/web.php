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
use App\Http\Controllers\MeteoController;

Route::get('/', [MeteoController::class, 'index'])->name('weather.index');
Route::get('/get-weather', [MeteoController::class, 'getWeather'])->name('weather.get');
