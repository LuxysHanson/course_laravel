<?php

use App\Http\Controllers\Admin\IndexController;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\CategoryController;
use App\Http\Controllers\NewsController;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Admin\CategoryController as AdminCategoryController;
use App\Http\Controllers\Admin\NewsController as AdminNewsController;

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
Route::view('/about', 'pages.about')->name('about');

// Страница - новостей и категории новостей
Route::name('news.')
    ->prefix('news')
    ->group(function () {
        Route::get('/', [NewsController::class, 'index'])->name('index');
        Route::get( '/add', [NewsController::class, 'add'])->name('add');
        Route::get('/view/{id}', [NewsController::class, 'view'])->name('view');
        Route::get('/categories', [CategoryController::class, 'index'])->name('categories');
        Route::get('/categories/{id}', [CategoryController::class, 'view'])->name('category');
    });

// Админка
Route::name('admin.')
    ->prefix('admin')
    ->group(function () {

        Route::get('/', [IndexController::class, 'index'])->name('index');
        Route::get('/test1', [IndexController::class, 'test1'])->name('test1');
        Route::get('/test2', [IndexController::class, 'test2'])->name('test2');

        // Новости
        Route::get('/news/export', [AdminNewsController::class, 'export'])->name('news.export');
        Route::resource('/news', AdminNewsController::class);

        // Категории
        Route::get('/categories/export', [AdminCategoryController::class, 'export'])->name('categories.export');
        Route::resource('/categories', AdminCategoryController::class);
    });


// Авторизация пользователей
Auth::routes();
