<?php

use App\Http\Controllers\AboutController;
use App\Http\Controllers\ArtikelController;
use App\Http\Controllers\ContactController;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\ServicesController;
use Illuminate\Support\Facades\Route;

Route::get('/', [HomeController::class, 'index'])->name('home');
Route::get('/layanan', [ServicesController::class, 'index'])->name('services');
Route::get('/artikel', [ArtikelController::class, 'index'])->name('articles');
Route::get('/tentang-kami', [AboutController::class, 'index'])->name('about');
Route::get('/kontak', [ContactController::class, 'index'])->name('contact');
