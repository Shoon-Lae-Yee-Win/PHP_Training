<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\ProductController;
use App\Http\Controllers\CategoryController;

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

//Product
Route::get('/list', [CategoryController::class, 'list'])->name('category#list');
Route::post('/create', [CategoryController::class, 'create'])->name('category#create');
Route::get('/delete/{id}', [CategoryController::class, 'delete'])->name('category#delete');
Route::get('/edit/{id}', [CategoryController::class, 'edit'])->name('category#edit');
Route::post('/update/{id}', [CategoryController::class, 'update'])->name('category#update');

//Category
Route::get('/', [ProductController::class, 'show'])->name('product#show');
Route::get('/prod/list', [ProductController::class, 'list'])->name('product#list');
Route::post('/prod/create', [ProductController::class, 'create'])->name('product#create');
Route::get('/prod/delete/{id}', [ProductController::class, 'delete'])->name('product#delete');
Route::get('/prod/edit/{id}', [ProductController::class, 'edit'])->name('product#edit');
Route::post('/prod/update/{id}', [ProductController::class, 'update'])->name('product#update');

//Export
Route::get('prod/export/', [ProductController::class, 'export'])->name('product#export');
Route::post('prod/import/', [ProductController::class, 'import'])->name('product#import');

//serach
Route::get('prod/search', [ProductController::class, 'search'])->name('product#search');
