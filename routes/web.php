<?php

use App\Http\Controllers\HomeController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\UrlController;

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

Route::get('/home', [HomeController::class, 'home'])->name('home');
Route::post('/store', [UrlController::class, 'store'])->name('store.url');

Route::get('/', function () {
    return view('auth.login');
});

Auth::routes();

Route::get('/{slug}', [UrlController::class, 'redirect'])->name('url.redirect');
