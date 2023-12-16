<?php

use App\Http\Controllers\DashboardController;
use App\Http\Controllers\ProductsController;
use App\Http\Controllers\StockController;
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

Route::get('/', [DashboardController::class, 'index']);

Route::get('/new-product', [ProductsController::class, 'index']);
Route::get('/product-list', [ProductsController::class, 'productList']);
Route::post('/new-product', [ProductsController::class, 'insertProduct']);

Route::get('/product-edit/{id}', [ProductsController::class, 'editProductForm']);
Route::post('/edit-product', [ProductsController::class, 'editProduct']);
Route::get('/product-details/{id}', [ProductsController::class, 'productDetails']);


Route::get('/stock-register', [StockController::class, 'index']);
Route::get('/stock-register-list', [StockController::class, 'stockRegisterList']);
Route::post('/stock-register', [StockController::class, 'stockEntry']);
