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

Route::get('login/{provider}/', [App\Http\Controllers\HomeController::class, 'redirect'])->name('login.redirect');
Route::get('login/{provider}/callback/', [App\Http\Controllers\HomeController::class, 'Callback'])->name('login.callback');

Route::get('/dashboard', [App\Http\Controllers\DashboardController::class, 'dashboard'])->name('dashboard');


Route::get('/', [App\Http\Controllers\HomeController::class, 'index'])->name('home');


Route::get('admin/dashboard', [App\Http\Controllers\AdminController::class, 'dashboard'])->name('admin.dashboard')->middleware('is_admin');
Route::post('admin/dashboard', [App\Http\Controllers\AdminController::class, 'dashboard'])->name('admin.dashboard')->middleware('is_admin');

Route::get('user/dashboard', [App\Http\Controllers\UserController::class, 'dashboard'])->name('user.dashboard');