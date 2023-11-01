<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\PageController;
use App\Http\Controllers\UserController;
use App\Http\Controllers\ResponseController;

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


Route::group(['middleware' => ['guest']], function(){
    Route::get('/register', [UserController::class, 'register'])->name('register');
    Route::post('/register', [UserController::class, 'store'])->name('register.store');
    Route::get('/login', [UserController::class, 'login'])->name('login');
    Route::post('/login', [UserController::class, 'loginAttempth'])->name('login.attempt');
});
Route::group(['middleware' => ['auth']], function(){
    Route::get('/logout', [UserController::class, 'logout'])->name('logout');

    Route::get('/', [ResponseController::class, 'index'])->name('home');

    Route::get('/search/{term}', [ResponseController::class, 'search'])->name('search');

    Route::resource('/response', ResponseController::class);
});




