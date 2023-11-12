<?php

use App\Http\Controllers\WEB\AcaraController;
use App\Http\Controllers\WEB\AuthController;
use App\Http\Controllers\WEB\DashboardController;
use App\Http\Controllers\WEB\InvoiceController;
use App\Http\Controllers\WEB\MitraController;
use App\Http\Controllers\WEB\PackageController;
use App\Http\Controllers\WEB\PackageFieaturesController;
use App\Http\Controllers\WEB\UserController;
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
Route::get('/w',function(){
    return view('welcome');
});
Route::get('/',function(){
    return redirect()->intended('/login');
});
Route::get('/login',[AuthController::class,'login'])->name('login');
Route::post('/login',[AuthController::class,'loginPost'])->name('login.post');

Route::middleware('auth')->group(function () {
    Route::get('/dashboard',[DashboardController::class,'home'])->name('home');
    Route::get('/buat-undangan',[AcaraController::class,'addAcara']);
    Route::get('/undangan',[AcaraController::class,'undangan']);
    Route::get('/undang-tamu',[AcaraController::class,'tamu']);

    Route::post('/post-acara',[AcaraController::class,'postAcara'])->name('acara.post');
    Route::get('detail-paket/{id}',[AcaraController::class,'paketDetail']);

    Route::resource('/paket',PackageController::class);
    Route::resource('/fitur',PackageFieaturesController::class);

    Route::get('buy-paket',[PackageController::class,'buy']);
    Route::get('buy-paket/{id}',[PackageController::class,'buyPaket']);
    Route::get('pembayaran/',[PackageController::class,'bayar']);
    Route::post('pembayaran/',[PackageController::class,'bukti']);

    Route::get('invoice',[InvoiceController::class,'index'])->name('invoice');
    Route::get('invoice-details',[InvoiceController::class,'details'])->name('invoice.details');
    
    Route::resource('/mitra',MitraController::class);
    Route::get('/users',[UserController::class,'allUser'])->name('user.all');
    Route::get('/users/profile/{id}',[UserController::class,'profile'])->name('user.profile');
    Route::post('/users/suport/{id}',[UserController::class,'suport'])->name('user.suport');
    Route::post('/logout',[AuthController::class,'logout'])->name('logout');
});

Route::get('/{slug}',[AcaraController::class,'index']);
Route::get('/{mitra}/{slug}',[AcaraController::class,'mitra']);