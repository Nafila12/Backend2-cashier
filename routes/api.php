<?php

use App\Http\Controllers\CategoryController;
use App\Http\Controllers\JenisController;
use App\Http\Controllers\MenuController;
use App\Http\Controllers\StokController;
use App\Http\Controllers\PelangganController;
use App\Http\Controllers\MejaController;
use App\Http\Controllers\PemesananController;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "api" middleware group. Make something great!
|
*/

Route::middleware(['auth:admin'])->group(function () {
});
Route::post('/login', [AdminAuthController::class, 'login']);
route::apiResource('/category2', CategoryController::class);
route::apiResource('/jenis', JenisController::class);
route::apiResource('/menu', MenuController::class);  
route::apiResource('/stok', StokController::class);   
route::apiResource('/meja', MejaController::class); 
route::apiResource('/pelanggan', PelangganController::class);
route::apiResource('/pemesanan', PemesananController::class);
route::apiResource('/user', UserController::class);