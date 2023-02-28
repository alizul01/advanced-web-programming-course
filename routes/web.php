<?php

use App\Http\Controllers\AboutController;
use App\Http\Controllers\AdminController;
use App\Http\Controllers\AuthController;
use App\Http\Controllers\ContactUsController;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\NewsController;
use App\Http\Controllers\ProductsController;
use App\Http\Controllers\ProgramController;
use Illuminate\Support\Facades\Route;

Route::middleware(['auth', 'admin'])->group(function () {
    Route::prefix('admin')->group(function () {
        Route::controller(AdminController::class)->group(function () {
            Route::get('/', 'index')->name('admin.dashboard');
            Route::get('/user', 'userIndex')->name('admin.user');
            Route::get('/user/{id}', 'userShow')->name('admin.user.show');
            Route::post('/user/{id}', 'userPost')->name('admin.user.post');

            // products
            Route::get('/products', 'productIndex')->name('admin.products');
            Route::get('/products/{id}', 'productsShow')->name('admin.products.show');
            Route::post('/products/{id}', 'productsPost');

            // program
            Route::get('/program', 'programIndex')->name('admin.program');
            Route::get('/program/{id}', 'programShow')->name('admin.program.show');
            Route::post('/program/{id}', 'programPost')->name('admin.program.post');

            // news
            Route::get('/news', 'newsIndex')->name('admin.news');
            Route::get('/news/{id}', 'newsShow')->name('admin.news.show');
            Route::post('/news/{id}', 'newsPost')->name('admin.news.post');
        });
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
    Route::controller(AuthController::class)->group(function () {
        Route::get('/login', 'index')->name('login');
        Route::post('/login', 'login')->name('login.post');
        Route::get('/register', 'registerIndex')->name('register');
        Route::post('/register', 'register')->name('register.post');
    });
});
