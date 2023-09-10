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
Route::get('/', function(){
    return view('index');
});
Route::get('/api', function(){
    return view('apiDoc');
})->name('apiDoc');
Route::get('/home', [HomeController::class, 'home'])->name('home');
Route::post('/store', [UrlController::class, 'store'])->name('store.url');

Auth::routes();

Route::get('/{slug}', [UrlController::class, 'redirect'])->name('url.redirect');
