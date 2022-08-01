<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\CustomAuthController;

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
/*------------Login & Registration------------------- */
Route::get('/login',[CustomAuthController::class,'login']);
Route::post('login-user',[CustomAuthController::class,'loginUser'])->name('login-user');
Route::get('/registration',[CustomAuthController::class,'registration']);
Route::post('/register-user',[CustomAuthController::class,'registerUser'])->name('register-user');

/*------------Movie Form------------------- */
Route::get('/movieform',[CustomAuthController::class,'movieform']);
Route::post('/movie-form',[CustomAuthController::class,'movierating'])->name('movie-form');

/*------------Watched Movies------------------- */
Route::get('/watchedmovies',[CustomAuthController::class,'watchedmovies']);

/*------------Search Movies------------------- */
Route::get('/viewmovies',[CustomAuthController::class,'viewmovies']);


