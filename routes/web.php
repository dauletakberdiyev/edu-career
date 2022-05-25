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

Auth::routes();

Route::get('/', [App\Http\Controllers\HomeController::class, 'index'])->name('home');
Route::post('/add/user', [App\Http\Controllers\UserController::class, 'store'])->name('user.add');
Route::post('/update/user', [App\Http\Controllers\UserController::class, 'update'])->name('user.update');

Route::group(['prefix' => 'staff'], function() {
    Route::get('/', [App\Http\Controllers\StaffController::class, 'index'])->name('staff');
    Route::get('/add', [App\Http\Controllers\StaffController::class, 'add'])->name('staff.add');
    Route::get('/update/{id}', [App\Http\Controllers\StaffController::class, 'update'])->name('staff.update');
    Route::post('/search', [App\Http\Controllers\StaffController::class, 'search'])->name('staff.search');
});
