<?php

use App\Http\Controllers\PasienController;
use App\Http\Controllers\PDFController;
use App\Http\Controllers\PriceController;
use Illuminate\Support\Facades\Artisan;
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
    return view('Welcome');
});

Auth::routes();

Route::group(['middleware' => 'auth'], function () {
    Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');
    Route::resource('pasiens', PasienController::class);
    Route::get('createPDF/{id}', PDFController::class)->name('createPDF');
    Route::get('price', PriceController::class)->name('price');
});

