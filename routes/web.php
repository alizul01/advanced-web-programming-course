<?php

use App\Http\Controllers\AboutController;
use App\Http\Controllers\AuthController;
use App\Http\Controllers\ContactUsController;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\NewsController;
use App\Http\Controllers\ProductsController;
use App\Http\Controllers\ProgramController;
use Illuminate\Support\Facades\Route;

Route::middleware(['auth', 'admin'])->group(function() {
    Route::prefix('admin')->group(function () {
        Route::get('/', [HomeController::class, 'admin'])->name('admin');
        Route::resource('news', NewsController::class)->except(['show']);
        Route::resource('programs', ProgramController::class)->except(['show']);
        Route::resource('products', ProductsController::class)->except(['show']);
    });
});

Route::middleware(['auth'])->group(function () {
    Route::get('/', [HomeController::class, 'index'])->name('home');
    Route::get('/about', [AboutController::class, 'index'])->name('about');
    Route::get('/logout', [AuthController::class, 'logout'])->name('logout');

    Route::prefix('products')->group(function () {
        Route::get('/', [ProductsController::class, 'index'])->name('products.index');
        Route::get('/{detail}', [ProductsController::class, 'show'])->name('products.show');
    });

    Route::prefix('news')->group(function () {
        Route::get('/', [NewsController::class, 'index'])->name('news.index');
        Route::get('/{detail}', [NewsController::class, 'show'])->name('news.show');
    });

    Route::prefix('programs')->group(function () {
        Route::get('/', [ProgramController::class, 'index'])->name('programs.index');
        Route::get('/{detail}', [ProgramController::class, 'show'])->name('programs.show');
    });

    Route::resource('contact', ContactUsController::class)->only(['index', 'store'])->names([
        'index' => 'contact.index',
        'store' => 'contact.store'
    ]);
});

Route::middleware(['guest'])->group(function () {
    Route::get('/login', [AuthController::class, 'index'])->name('login');
    Route::post('/login', [AuthController::class, 'login'])->name('login.post');
    Route::get('/register', [AuthController::class, 'registerIndex'])->name('register');
    Route::post('/register', [AuthController::class, 'register'])->name('register.post');
});

