<?php

use App\Http\Controllers\CategoryController;
use App\Models\Product;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\ProdukController;
use App\Http\Controllers\LaporanController;
use App\Http\Controllers\ProductController;
use App\Http\Controllers\SekolahController;
use App\Http\Controllers\PraktikumController;
use App\Http\Controllers\TransaksiController;

Route::get('/', [HomeController::class, "home"]);

// Route::get("/biodata", function () {
//     return view("biodata",);
// });

// Route::get("/latihan", function () {
//     return view("latihan");
// });

// Route::get("/produk", function () {
//     return view("produk");
// });
// Route::get("/produk", [ProdukController::class, "product"]);

Route::get("/transaksi", [TransaksiController::class, "transaksi"]);

Route::controller(ProductController::class)->group(function () {

    Route::get("/produk",  "product");

    Route::get('/view-product',  'index')->name('product.index');

    Route::get('/add-product',  'create')->name('product.create');

    Route::post('/view-product',  'store')->name('product.store');

    Route::get('/product/edit/{id}',  'edit')->name('product.edit');

    Route::post('/product/edit/{id}',  'update')->name('product.update');

    Route::post('/product/delete/{id}',  'destroy')->name('product.delete');

    Route::get('/product/export/excel', 'excel')->name('product.excel');

    Route::get('/product/export/pdf', 'pdf')->name('product.pdf');

    Route::get('/product/chart', 'chart')->name('product.chart');
});

// * group route by  category controller
Route::controller(CategoryController::class)->group(function () {
    Route::get('/category', 'index')->name('category.index');

    Route::get('/add-category', 'create')->name('category.create');

    Route::post('/category', 'store')->name('category.store');

    Route::get('/category/edit/{id}', 'edit')->name('category.edit');

    Route::post('/category/edit/{id}', 'update')->name('category.update');

    Route::post('/category/delete/{id}', 'destroy')->name('category.delete');
});

Route::get("/laporan", [LaporanController::class, "laporan"]);
