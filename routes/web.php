<?php

use App\Http\Controllers\Auth\LoginController;
use Illuminate\Support\Facades\Route;
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

Route::get('/', function () {
    return view('welcome');
});

Auth::routes();

// Authentication using constructor in controller function
Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');
Route::get('/contact', [App\Http\Controllers\ContactController::class, 'index'])->name('contact');

// Authentication using group middleware function
Route::middleware(['auth'])->group(function () {
    Route::get('/about', [App\Http\Controllers\AboutController::class, 'index'])->name('about');
});

// Authentication using route middleware
Route::view('/services', 'services')->middleware('auth');

// Logout Function
Route::get('/logout', [LoginController::class, 'logout']);