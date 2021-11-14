<?php

use App\Http\Controllers\Admin\IndexController;
use App\Http\Controllers\Admin\NewsController as AdminNewsController;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\CategoriesController;
use App\Http\Controllers\NewsController;
use Illuminate\Support\Facades\Auth;
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
Route::view('/about', 'pages.about')->name('about');

// Страница - новостей и категории новостей
Route::name('news.')
    ->prefix('news')
    ->group(function () {
        Route::get('/', [NewsController::class, 'index'])->name('index');
        Route::get( '/add', [NewsController::class, 'add'])->name('add');
        Route::get('/view/{id}', [NewsController::class, 'view'])->name('view');
        Route::get('/categories', [CategoriesController::class, 'index'])->name('categories');
        Route::get('/categories/{id}', [CategoriesController::class, 'view'])->name('category');
    });

// Админка
Route::name('admin.')
    ->prefix('admin')
    ->group(function () {

        Route::get('/', [IndexController::class, 'index'])->name('index');
        Route::get('/test1', [IndexController::class, 'test1'])->name('test1');
        Route::get('/test2', [IndexController::class, 'test2'])->name('test2');

        // Новости
        Route::name('news.')
            ->prefix('news')
            ->group(function () {
                Route::get('/index', [AdminNewsController::class, 'index'])->name('index');
                Route::get('/export', [AdminNewsController::class, 'export'])->name('export');
                Route::get( '/create', [AdminNewsController::class, 'create'])->name('create');
                Route::post('/add', [AdminNewsController::class, 'add'])->name('add');
            });
    });


// Авторизация пользователей
Auth::routes();
