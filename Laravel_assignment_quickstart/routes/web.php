<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\PostController;

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

/**
 *create.php
 */
Route::get('/', [PostController::class, 'create']);
/**
 * store data
 */
Route::post('/store', [PostController::class, 'store']);
/**
 * delete data
 */
Route::get('/delete/{id}', [PostController::class, 'destroy']);
/**
 * edit data
 */
Route::get('/edit/{id}', [PostController::class, 'edit']);
/**
 * update data
 */
Route::post('/edit/{id}', [PostController::class, 'update']);
