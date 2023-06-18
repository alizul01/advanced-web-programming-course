<?php

use App\Http\Controllers\{
    Admin\UserController,
    AdminController,
    AuthController,
    ContactUsController,
    HomeController,
    NewsController,
    ProductsController,
    ProgramController
};
use Illuminate\Support\Facades\Route;

Route::middleware(['auth', 'admin'])->group(function () {
    Route::prefix('admin')->group(function () {
        Route::resource('user', UserController::class)->parameters([
            'user' => 'id'
        ])->names([
            'index' => 'admin.user',
            'show' => 'admin.user.show',
            'edit' => 'admin.user.edit',
            'update' => 'admin.user.update',
            'destroy' => 'admin.user.delete',
        ]);
        Route::post('user', [UserController::class, 'exportToPDF'])->name('admin.user.pdf');
        Route::resource('program', ProgramController::class)->parameters([
            'program' => 'id'
        ])->names([
            'index' => 'admin.program'
        ])->except(['show']);
        Route::get('/', [AdminController::class, 'index'])->name('admin.dashboard');
        Route::resource('news', NewsController::class)->parameters([
            'news' => 'id'
        ])->names([
            'index' => 'admin.news',
        ]);
        Route::resource('products', ProductsController::class)->parameters([
            'products' => 'id'
        ])->names([
            'index' => 'admin.products',
        ]);
    });
});

Route::middleware(['auth'])->group(function () {
    Route::get('/', [HomeController::class, 'index'])->name('home');
    Route::get('/about', function () {
        return response()->view('pages.about');
    })->name('about');
    Route::get('/logout', [AuthController::class, 'logout'])->name('logout');

    Route::prefix('products')->group(function () {
        Route::get('/', [ProductsController::class, 'index'])->name('products.index');
        Route::get('/{product:slug}', [ProductsController::class, 'show'])->name('products.show');
    });

    Route::resource('program', ProgramController::class)->parameters([
        'program' => 'program:slug'
    ])->only(['index', 'show']);

    Route::prefix('news')->group(function () {
        Route::get('/', [NewsController::class, 'index'])->name('news.index');
        Route::get('/{news:slug}', [NewsController::class, 'show'])->name('news.show');
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
