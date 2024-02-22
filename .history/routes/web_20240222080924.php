<?php

use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\BeritaController;
use App\Http\Controllers\KategoriController;
use App\Http\Controllers\PagesController;

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


Auth::routes();

Route::get('/dashboard', [HomeController::class, 'index'])->name('home');
Route::middleware(['auth'])->group(function () {
    Route::controller(BeritaController::class)->group(function () {
        Route::get('/berita', 'index');
        Route::get('/berita-create', 'create');
        Route::post('/berita-create', 'store')->name('berita.perform');
        Route::get('/berita-edit/{id}', 'edit')->name('berita.edit');
        Route::put('/berita-edit/{id}', 'update')->name('berita.update');
        Route::delete('berita/{id}', 'destroy')->name('berita.delete');
    });
    Route::controller(KategoriController::class)->group(function () {
        Route::get('/kategori', 'index');
        Route::post('/kategori', 'store')->name('kategori.perform');
        Route::get('/kategori-edit/{id}', 'edit')->name('kategori.edit');
        Route::put('/kategori-edit/{id}', 'update')->name('kategori.update');
        Route::delete('kategori/{id}', 'destroy')->name('kategori.delete');
    });
});
Route::controller(PagesController::class)->group(function () {
    Route::get('/', 'index')->name('beranda');
    Route::get('/{id}', 'detail')->name('detail');
});
