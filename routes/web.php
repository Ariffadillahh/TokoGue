<?php

use App\Http\Controllers\AlamatController;
use App\Http\Controllers\BrandController;
use App\Http\Controllers\ChartSizeController;
use App\Http\Controllers\DiskonController;
use App\Http\Controllers\KeranjangController;
use App\Http\Controllers\LoginController;
use App\Http\Controllers\OrdersController;
use App\Http\Controllers\PavProductController;
use App\Http\Controllers\ProductController;
use App\Http\Controllers\RatingController;
use App\Http\Controllers\RegisterController;
use App\Http\Controllers\UserControllers;
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

Route::get('/register', [RegisterController::class, 'index']);
Route::post('/register/action', [RegisterController::class, 'store'])
    ->middleware('guest')
    ->name('registeraction');
Route::get('/login', [LoginController::class, 'index'])
    ->name('login')
    ->middleware('guest');
Route::post('/login/action', [LoginController::class, 'store'])->name('loginaction');
Route::post('/logout', [LoginController::class, 'destroy'])
    ->name('logout')
    ->middleware('auth');
Route::get('/', [LoginController::class, 'show'])->name('homepage');
Route::get('/search', [OrdersController::class, 'search'])->name('search');

Route::get('/kasir', [KeranjangController::class, 'index']);
Route::post('/kasir', [KeranjangController::class, 'store'])->name('kasirSave');

Route::middleware('auth')->group(function () {
    Route::get('/product/detail/{id}', [ProductController::class, 'show'])->name('detail');
    Route::post('/product/detail/addpav', [PavProductController::class, 'store'])->name('addPav');
    Route::post('/product/detail/unpav', [PavProductController::class, 'destroy'])->name('unPav');
    Route::get('/alamat', [AlamatController::class, 'index'])->name('alamat');
    Route::post('/alamat/tambah', [AlamatController::class, 'store'])->name('addAlamat');
    Route::put('/alamat/update', [AlamatController::class, 'update'])->name('updateAlamat');
    Route::post('/alamat/hapus', [AlamatController::class, 'destroy'])->name('hapusAlamat');
    Route::get('/favorite', [PavProductController::class, 'index'])->name('fav');
    Route::post('/product/detail/buy', [OrdersController::class, 'store'])->name('buy');
    Route::get('/orders/dikemas', [OrdersController::class, 'index'])->name('ordersKemas');
    Route::get('/orders/diantar', [OrdersController::class, 'diantar'])->name('ordersDiantar');
    Route::get('/orders/selesai', [OrdersController::class, 'selesai'])->name('ordersSelesai');
    Route::get('/orders/selesai/detail/{id}', [OrdersController::class, 'detail'])->name('orderdetail');
    Route::post('/orders/selesai', [OrdersController::class, 'edit'])->name('finishorder');
    Route::post('/rate', [RatingController::class, 'store'])->name('addRating');
    Route::get('/settings', [LoginController::class, 'settings'])->name('settings');
    Route::post('/settings/generl', [UserControllers::class, 'settingsGen'])->name('settingsGen');
    Route::post('/settings/password', [UserControllers::class, 'settingsPass'])->name('settingsPass');
});

Route::middleware(['checkRole:admin,superadmin'])->group(function () {
    Route::get('/dashboard', [LoginController::class, 'dashboard'])->name('dashboard');
    Route::get('/brand', [BrandController::class, 'index'])->name('brand');
    Route::post('/brand', [BrandController::class, 'store'])->name('addBrand');
    Route::post('/brand/edit', [BrandController::class, 'update'])->name('editBrand');
    Route::post('/brand/hapus', [BrandController::class, 'destroy'])->name('hapusBrand');
    Route::get('/orderan', [LoginController::class, 'orderan'])->name('oerderan');
    Route::get('/orderan/diantar', [LoginController::class, 'orderanDiantar'])->name('orderanDiantar');
    Route::get('/orderan/selesai', [LoginController::class, 'orderanSelesai'])->name('orderanSelesai');
    Route::get('/orderan/detail/{id}', [LoginController::class, 'orderanDetail'])->name('oerderanAdmin');
    Route::post('/order/update', [OrdersController::class, 'update'])->name('updateOrder');
    Route::get('/users', [LoginController::class, 'users'])->name('users');
    Route::get('/product', [ProductController::class, 'index']);
    Route::get('/product/add-product', [ProductController::class, 'addproduct']);
    Route::post('/product/add-product', [ProductController::class, 'store'])->name('add');
    Route::get('/product/edit-product/{id}', [ProductController::class, 'editproduct']);
    Route::post('/product/edit-product/{id}', [ProductController::class, 'edit'])->name('edit');
    Route::post('/product/hapus-product', [ProductController::class, 'destroy'])->name('hapus');
    Route::delete('/product/edit-product', [ProductController::class, 'deleteSize'])->name('delete-size');
    Route::post('/product/edit-product', [ChartSizeController::class, 'addSize'])->name('addSize');
    Route::post('/size', [ChartSizeController::class, 'store'])->name('size');
    Route::post('/size/edit', [ChartSizeController::class, 'update'])->name('editSize');
    Route::post('/size/hapus', [ChartSizeController::class, 'destroy'])->name('hapusSize');
    Route::get('/diskon', [DiskonController::class, 'index'])->name('diskon');
    Route::post('/diskon', [DiskonController::class, 'store'])->name('addDiskon');
    Route::post('/hapusDiskon', [DiskonController::class, 'destroy'])->name('hapusDiskon');
    Route::post('/editDiskon', [DiskonController::class, 'update'])->name('editDiskon');
});

Route::middleware(['checkRole:superadmin'])->group(function () {
    Route::get('/users', [LoginController::class, 'users'])->name('users');
    Route::post('/users', [LoginController::class, 'addUsers'])->name('addUser');
});
