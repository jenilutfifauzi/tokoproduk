<?php

use App\Http\Controllers\CategoriesController;
use App\Http\Controllers\ProductController;
use App\Http\Controllers\VariantsController;
use Illuminate\Support\Facades\Route;

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

Route::get('/', function () {
    return view('dashboard');
});

//Categories
Route::get('/categories/data', [CategoriesController::class, 'data'])->name('categories.data');
Route::resource('/categories', CategoriesController::class);

//Variants
Route::get('/variants/data', [VariantsController::class, 'data'])->name('variants.data');
Route::resource('/variants', VariantsController::class);


//Product
Route::get('/product/data', [ProductController::class, 'data'])->name('product.data');
Route::resource('/product', ProductController::class);

