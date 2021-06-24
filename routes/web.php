<?php

use Illuminate\Support\Facades\Route;

use App\Http\Controllers\DashboardController;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\MasukController;
use App\Http\Controllers\KeluarController;
use App\Http\Middleware\Admin;
use App\Http\Middleware\User;


use App\Http\Controllers\BarangController;
use App\Http\Controllers\LaporanController;
use SebastianBergmann\CodeCoverage\Report\Html\Dashboard;

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


// //tampilan awal
Route::get('/',[DashboardController::class,'index']);
// Route::get('/profile/{{ Auth::user()->id }}',[DashboardController::class,'profile']);


Auth::routes();

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');



//hak aksess Admin


Route::group(['midlleware' => ['auth','admin']], function(){



    //stock barang
    Route::get('/stock',[BarangController::class,'index']);
    //route untuk tambah data
    Route::post('/stock',[BarangController::class,'store']);
    //Route::get('edit/{idbarang}',[BarangController::class,'edit']);
    Route::post('/stock/update/{idbarang}',[BarangController::class,'update']);
    Route::get('/stock/edit/{idbarang}',[BarangController::class,'edit']);



    //masuk barang
    Route::get('/masuk',[MasukController::class,'index']);
    Route::post('/masuk',[MasukController::class,'store']);
    //Route::get('/masuk/edit/{idmasuk}',[MasukController::class,'edit']);
    //Route::post('/masuk/update/{idmasuk}',[MasukController::class,'update']);
    Route::get('/masuk/delete/{idmasuk}',[MasukController::class,'destroy']);


    //Keluar Barang
    Route::get('/keluar',[KeluarController::class,'index']);
    Route::post('/keluar',[KeluarController::class,'store']);
    Route::get('/keluar/delete/{idkeluar}',[KeluarController::class,'destroy']);
    Route::get('/laporan',[LaporanController::class,'index']);
    Route::get('/laporan/cetak',[LaporanController::class,'cetak_pdf']);
});


//hak aksess User
    Route::group(['middleware'=> ['auth','user']], function(){

        //laporan
         Route::get('/laporan',[LaporanController::class,'index']);
     Route::get('/laporan/cetak',[LaporanController::class,'cetak_pdf']);
    });
