<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AdminController;
use App\Http\Controllers\Auth\AdminLoginController;
use App\Http\Controllers\Auth\LoginController;
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

// Route::get('/', function () {
//     return view('welcome');
// });
Route::get('/login',  [LoginController::class, 'loginForm'])->name('login');
Route::post('/login',  [LoginController::class, 'login'])->name('login.submit');
Route::post('/logout',  [LoginController::class, 'logout'])->name('logout');;
Route::get('/',  [AdminLoginController::class, 'loginForm'])->name('admin.login');
Route::get('/register',  [AdminLoginController::class, 'registerForm'])->name('admin.register');
Route::post('/register',  [AdminLoginController::class, 'register' ])->name('admin.register.submit');
Route::prefix('admin')->group(function() {
    
    Route::post('/login',  [AdminLoginController::class, 'login' ])->name('admin.login.submit');
    Route::get('/logout',  [AdminLoginController::class, 'logout' ])->name('admin.logout');
    
    Route::get('/',  [AdminController::class, 'index'])->name('admin.dashboard');
});
