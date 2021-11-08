<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\CitiesController;
use App\Http\Controllers\FirmController;
use \App\Http\Controllers\LoginController;

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

Route::get('/', [CitiesController::class, 'index'])->name('home');
Route::post('/', [CitiesController::class, 'index'])->name('homee');
Route::get('/reg', [CitiesController::class, 'index'])->name('register');
Route::post('/logg', [FirmController::class, 'log'])->name('homeee');
Route::post('/register', [FirmController::class, 'store'])->name('registerfirm');
Route::get('/login', function (){
   return view('pages.login');
})->name('login');
Route::get('/profile', function (){
    return view('pages.profile');
})->name('profile');


