<?php

use Illuminate\Support\Facades\Route;

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

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');

// Route::method('url', [Controller,method])->('name')

Route::get('/transactions', [App\Http\Controllers\TransactionController::class,'index'])->name('transactions.index');
Route::get('/transactions/create', [App\Http\Controllers\TransactionController::class,'create'])->name('transactions.create');
Route::post('/transactions/create', [App\Http\Controllers\TransactionController::class,'store'])->name('transactions.store');

Route::get('/users', [App\Http\Controllers\UserController::class,'index'])->name('users.index');