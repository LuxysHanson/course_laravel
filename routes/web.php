<?php

use App\Http\Controllers\Admin\IndexController;
use App\Http\Controllers\Admin\ParserController;
use App\Http\Controllers\Admin\UsersController;
use App\Http\Controllers\Auth\SocialController;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\CategoryController;
use App\Http\Controllers\NewsController;
use App\Http\Controllers\ProfileController;
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

// Профиль пользователя
Route::get( '/profile', [ProfileController::class, 'index'])->name('profile')->middleware('auth');
Route::put( '/profile/{user}', [ProfileController::class, 'update'])->name('profile.update')->middleware('auth');

// Страница - новостей и категории новостей
Route::name('news.')
    ->prefix('news')
    ->group(function () {
        Route::get('/', [NewsController::class, 'index'])->name('index');
        Route::get('/add', [NewsController::class, 'add'])->name('add');
        Route::post('/create', [NewsController::class, 'create'])->name('create');
        Route::get('/view/{id}', [NewsController::class, 'view'])->name('view');
        Route::get('/categories', [CategoryController::class, 'index'])->name('categories');
        Route::get('/categories/{id}', [CategoryController::class, 'view'])->name('category');
    });

// Админка
Route::name('admin.')
    ->prefix('admin')
    ->middleware(['auth', 'is_admin'])
    ->group(function () {

        Route::get('/', [IndexController::class, 'index'])->name('index');
        Route::get('/test1', [IndexController::class, 'test1'])->name('test1');
        Route::get('/test2', [IndexController::class, 'test2'])->name('test2');

        // Пользователи
        Route::get('/users/export', [UsersController::class, 'export'])->name('users.export');
        Route::resource('/users', UsersController::class);

        // Парсинг новостей
        Route::get('/parser', [ParserController::class, 'index'])->name('parser.index');
        Route::post('/parser/news', [ParserController::class, 'news'])->name('parser.news');

        // Новости
        Route::get('/news/export', [AdminNewsController::class, 'export'])->name('news.export');
        Route::resource('/news', AdminNewsController::class);

        // Категории
        Route::get('/categories/export', [AdminCategoryController::class, 'export'])->name('categories.export');
        Route::resource('/categories', AdminCategoryController::class);
    });

// Авторизация через социальные сети
Route::get('/auth/vk', [SocialController::class, 'loginVK'])->name('vkLogin');
Route::get('/auth/vk/response', [SocialController::class, 'responseVK'])->name('vkResponse');

// Авторизация пользователей
Auth::routes();
