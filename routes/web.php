<?php

use App\Http\Controllers\CategoryController;
use App\Http\Controllers\NewsController;
use App\Http\Controllers\PageController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\SortArrayController;

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

Route::get('/', [SortArrayController::class, 'index']);

Route::get('/pages', [PageController::class, 'index']);

Route::get('/page/{slug}', [PageController::class, 'page'])->where('slug', '[a-zA-Z0-9-]+');

Route::get('/category/{id}', [CategoryController::class, 'getCategoryById'])->where('id', '[0-9]+');
Route::get('/category/{slug}', [CategoryController::class, 'getCategoryBySlug'])->where('id', '[a-zA-Z-]+');

Route::resource('news', NewsController::class);
