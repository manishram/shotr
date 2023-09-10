<?php

use App\Http\Controllers\HomeController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\UrlController;
use Illuminate\Support\Facades\Auth;


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
Route::get('/', function(){return view('index');})->name('landing.page');

Route::get('/api-doc', function(){return view('api-doc');})->name('api-doc');

Route::get('/home', [HomeController::class, 'getUrls'])->name('home');

Route::get('/delete-url/{id}', [UrlController::class, 'deleteUrl'])->name('url.delete');

Route::post('/store', [UrlController::class, 'store'])->name('store.url');

Auth::routes();

Route::get('/{slug}', [UrlController::class, 'redirect'])->name('url.redirect');