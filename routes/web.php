<?php

use App\Http\Controllers\AbsensiController;
use App\Http\Controllers\AntreanController;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\PasienController;
use App\Http\Controllers\PDFController;
use App\Http\Controllers\PriceController;
use Illuminate\Support\Facades\Auth;
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

Route::get('/antrean-wizard', [AntreanController::class, 'wizard'])->name('antrean.wizard');
Route::post('/antrean-wizard', [AntreanController::class, 'storeWizard'])->name('antrean.wizard.store');

Auth::routes();

Route::group(['middleware' => 'auth'], function () {
    Route::get('/home', [HomeController::class, 'index'])->name('home');
    Route::resource('pasiens', PasienController::class);
    Route::resource('absensis', AbsensiController::class);
    Route::resource('antreans', AntreanController::class);
    Route::get('createPDF/{pasien}', [PDFController::class, 'download'])->name('createPDF');
    Route::get('previewPDF/{pasien}', [PDFController::class, 'preview'])->name('previewPDF');
    Route::get('price', PriceController::class)->name('price');
});
