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

Route::get('/', function () {
    return view('home');
});

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');

Route::get('/dashboard', [App\Http\Controllers\DashboardController::class, 'index']);
Route::get('/produk/{id}', [App\Http\Controllers\DashboardController::class, 'show']);

Route::get('/produk', [App\Http\Controllers\ProdukController::class, 'index']);
Route::get('/create', [App\Http\Controllers\ProdukController::class, 'create']);
Route::post('/produk', [App\Http\Controllers\ProdukController::class, 'store']);
Route::get('/produk/edit/{id}', [App\Http\Controllers\ProdukController::class, 'edit']);
Route::put('/produk/{id}', [App\Http\Controllers\ProdukController::class, 'update']);
Route::delete('/produk/{id}', [App\Http\Controllers\ProdukController::class, 'destroy']);
Route::get('/cari', [App\Http\Controllers\ProdukController::class, 'cari']);
