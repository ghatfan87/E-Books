<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\PerpustakaanController;
use App\Http\Controllers\LoginController;


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

Route::get('/', [PerpustakaanController::class,'index']);
Route::get('/login', [LoginController::class,'login']);
Route::get('/register', [LoginController::class,'register']);
Route::post('/register', [LoginController::class,'regis'])->name('registerAccount');
Route::post('/login', [LoginController::class,'auth'])->name('login.post');
Route::post('/dashboard', [LoginController::class,'dashboard'])->name('dashboard');
Route::get('/read', [LoginController::class,'read'])->name('read');
