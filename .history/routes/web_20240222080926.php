<?php

use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\filmController;
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
        Route::get('/film', 'index');
        Route::get('/film-create', 'create');
        Route::post('/film-create', 'store')->name('film.perform');
        Route::get('/film-edit/{id}', 'edit')->name('film.edit');
        Route::put('/film-edit/{id}', 'update')->name('film.update');
        Route::delete('film/{id}', 'destroy')->name('film.delete');
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
