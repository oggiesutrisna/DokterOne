<?php

use App\Http\Controllers\PasienController;
use App\Http\Controllers\PDFController;
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
    return view('welcome');
});

Auth::routes();

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');

// Route::get('qrpasien', [PasienScanController::class, 'scan']);;
Route::resource('pasiens', PasienController::class);

Route::get('createPDF/{id}', [PDFController::class, 'createPDF'])->name('createPDF');

Route::get('/clear-cache', function () {
    Artisan::call('cache:clear');
    return 'cache is cleared';
});
