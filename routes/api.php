<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\ProdukController;
use App\Http\Controllers\AuthController;
use App\Http\Controllers\AdminController;
use App\Http\Controllers\TransaksiController;

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
//Route::get('produk', [ProdukController::class, 'index']);
//Route::post('produk', [ProdukController::class, 'store']);
//Route::post('produk/{id}', [ProdukController::class, 'update']);

Route::post('/register', [AuthController::class, 'register']);
Route::post('/login', [AuthController::class, 'login']);
Route::post('/login_admin', [AuthController::class, 'loginAdmin']);
 

Route::middleware('auth:sanctum')->group(function () {
    Route::resource('produk', ProdukController::class)->except('create', 'edit', 'destroy');
    Route::post('/logout', [AuthController::class, 'logout']);
    Route::post('/logout_admin', [AuthController::class, 'logoutAdmin']);
    Route::resource('admin', AdminController::class);
    Route::post('transaksi', [TransaksiController::class, 'store']);
    Route::put('transaksi/{id}', [TransaksiController::class, 'updateResult']);
    Route::get('transaksi_result/{id}', [TransaksiController::class, 'showResult']);
    Route::get('transaksi', [TransaksiController::class, 'index']);
    Route::get('transaksi_result', [TransaksiController::class, 'indexResult']);
    Route::get('transaksi/{id}', [TransaksiController::class, 'show']);
});