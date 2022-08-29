<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\OrderCRUDController;
use App\Http\Controllers\MenuCRUDController;

Route::resource('order', OrderCRUDController::class);

Route::resource('menu', MenuCRUDController::class);

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
Route::get('/print/{id}', [OrderCRUDController::class,'print'])->name('printorder');
Route::get('/autoprint', [OrderCRUDController::class,'autoprint'])->name('autoprint');