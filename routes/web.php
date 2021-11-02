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

Route::get('/', function () {
    return view('welcome');
});

Route::get('/empty', function () {
    return view('empty');
});

Auth::routes();

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');

Route::get('transaction/courier', [App\Http\Controllers\TransactionController::class, 'index'])->name('courier');
Route::get('transaction/courier/getData', [App\Http\Controllers\TransactionController::class, 'getCourier'])->name('courier.list');
Route::get('transaction/courier/{id}', [App\Http\Controllers\TransactionController::class, 'show']);
