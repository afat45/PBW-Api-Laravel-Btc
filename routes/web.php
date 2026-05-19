<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\CryptoController;

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

Route::get('/', function () {
    return view('welcome');
});

// Cryptocurrency Routes
Route::prefix('crypto')->group(function () {
    Route::get('/prices', [CryptoController::class, 'index'])->name('crypto.prices');
    Route::get('/api/prices', [CryptoController::class, 'fetchPrices'])->name('crypto.api.prices');
});
