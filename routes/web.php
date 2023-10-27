<?php

use Illuminate\Support\Facades\Route;
use Illuminate\Support\Facades\Auth;

use App\Http\Controllers\ArticleController;
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

Route::get('/', function () {
    return view('welcome');
});

Auth::routes();

// Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');

Route::controller(ArticleController::class)->group(function () {
    Route::get('/home', 'index')->name('home');

    Route::prefix('articles')->group(function () {
        Route::get('/create', 'create')->name('articles.create');
        Route::post('/create', 'store')->name('articles.store');
        Route::get('/{id}/detail', 'show')->name('articles.show');
        Route::get('/{id}/edit', 'edit')->name('articles.edit');
        Route::put('/{id}/update', 'update')->name('articles.update');
        Route::delete('/{id}/destroy', 'destroy')->name('articles.destroy');
    });
});
