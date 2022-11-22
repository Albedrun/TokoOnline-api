<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\ProdukController;
use App\Http\Controllers\AuthController;
use App\Http\Controllers\AdminController;

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

Route::middleware('auth:sanctum')->group(function () {
    Route::resource('produk', ProdukController::class)->except('create', 'edit', 'destroy');
    Route::post('/logout', [AuthController::class, 'logout']);
    Route::resource('admin', AdminController::class);
});