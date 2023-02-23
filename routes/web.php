<?php

use App\Http\Controllers\AboutController;
use App\Http\Controllers\ArticleController;
use App\Http\Controllers\ContactUsController;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\NewsController;
use App\Http\Controllers\ProductController;
use App\Http\Controllers\ProductsController;
use App\Http\Controllers\ProgramController;
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

Route::middleware(['auth'])->prefix('products')->group(function () {
    Route::get('/', [ProductsController::class, 'index'])->name('products');
    Route::get('/{detail}', [ProductsController::class, 'show']);
});

Route::middleware(['auth'])->prefix('news')->group(function () {
    Route::get('/', [NewsController::class, 'index'])->name('news');
    Route::get('/{detail}', [NewsController::class, 'show']);
});

Route::middleware(['auth:guest'])->group(function () {
    Route::get('/login', [HomeController::class, 'login'])->name('login');
});

Route::get('/', [HomeController::class, 'index'])->middleware('auth')->name('home');
Route::get('/about', [AboutController::class, 'index'])->middleware('auth')->name('about');
Route::group(['prefix' => 'programs'], function () {
    Route::get('/', [ProgramController::class, 'index'])->name('program');
    Route::get('/{detail}', [ProgramController::class, 'show']);
});

Route::resource('contact', ContactUsController::class)->names([
    'index' => 'contact',
    'store' => 'contact.store'
]);
