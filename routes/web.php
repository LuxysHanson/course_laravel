<?php

use App\Http\Controllers\Admin\IndexController;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\News\CategoriesController;
use App\Http\Controllers\News\NewsController;
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

// Главная страница
Route::get('/', [HomeController::class, 'index'])->name('home');

// Страница - О нас
Route::view('/about', 'about')->name('about');

// Страница - новостей и категории новостей
Route::name('news.')
    ->prefix('news')
    ->group(function () {
        Route::get('/', [NewsController::class, 'index'])->name('index');
        Route::get('/categories', [CategoriesController::class, 'index'])->name('categories');
        Route::get('/{id}', [NewsController::class, 'view'])->name('view');
        Route::get('/categories/{id}', [CategoriesController::class, 'view'])->name('category');
    });

// Админка
Route::name('admin.')
    ->prefix('admin')
    ->group(function () {
        Route::get('/', [IndexController::class, 'index'])->name('index');
        Route::get('/test1', [IndexController::class, 'test1'])->name('test1');
        Route::get('/test2', [IndexController::class, 'test2'])->name('test2');
    });

