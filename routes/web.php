<?php

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

$routes = include __DIR__ ."/routes.php";

foreach ($routes as $link => $view) {
    Route::get($link, function () use ($view) {
        return view($view);
    });
}

