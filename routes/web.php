<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\PenghuniController;
use App\Http\Controllers\RumahController;
use App\Http\Controllers\PembayaranController;
use App\Http\Controllers\PengeluaranController;

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
Route::resource('penghunis', PenghuniController::class);
Route::resource('rumahs', RumahController::class);
Route::resource('pembayarans', PembayaranController::class);
Route::resource('pengeluarans', PengeluaranController::class);
