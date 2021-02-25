<?php

use App\Http\Controllers\Auth\RegisterController;
use App\Http\Controllers\VacancyController;
use App\Http\Controllers\Auth\LoginController;
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
})->name('/');

Route::resource('/vacancy', VacancyController::class)->middleware('auth');

Route::post('/login', [LoginController::class, 'authenticate']);
Route::get('/login', [LoginController::class, 'index'])->name('login');
Route::match(['GET', 'POST'], '/logout', [LoginController::class, 'logout'])->name('logout');

Route::post('/register', [RegisterController::class, 'register']);
Route::get('/register', [RegisterController::class, 'index'])->name('register');

