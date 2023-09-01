<?php

use App\Http\Controllers\AuthController;
use App\Http\Controllers\ProductController;
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

Route::get('/', [AuthController::class, 'login'])->name('auth.login');
Route::post('/', [AuthController::class, 'doLogin']);
route::get('/product', [ProductController::class, 'index'])->name('product.index')->middleware('auth');
route::get('/new', [ProductController::class, 'create'])->name('product.create')->middleware('auth');
route::post('/new', [ProductController::class, 'store']);
route::get('/product/{product}/edit', [ProductController::class, 'edit'])->name('product.edit')->middleware('auth');
route::post('/product/{product}/edit', [ProductController::class, 'update']);
route::get('/{product}/delete', [ProductController::class, 'delete'])->name('product.delete');
route::get('/{product}/show', [ProductController::class, 'show'])->name('product.show');
route::get('/product/sortie', [ProductController::class, 'sortie'])->name('product.sortie')->middleware('auth');
route::post('product/sortie', [ProductController::class, 'sale']);
Route::get('/logout', [AuthController::class, 'logout'])->name('auth.logout');
