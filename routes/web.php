<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\CitiesController;
use App\Http\Controllers\FirmController;
use \App\Http\Controllers\ClientsController;
use \App\Http\Controllers\ProbaController;

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
Route::post('/', [CitiesController::class, 'index'])->name('home');
Route::get('/reg', [CitiesController::class, 'index'])->name('register');
Route::post('/logg', [FirmController::class, 'log'])->name('home');
Route::post('/register', [FirmController::class, 'store'])->name('register');
Route::get('/login', function (){
   return view('pages.login');
})->name('login');

//Route::group(['middleware' => 'user'], function() {
Route::get('/user/profile', [FirmController::class, 'user'])->name('profile');
Route::get('/user/clients', [ClientsController::class, 'clients'])->name('clients');
Route::get('/user/clients', [ClientsController::class, 'show'])->name('clientsshow');
Route::get('/user/clients/add', [ClientsController::class, 'addclient'])->name('addclients');
Route::post('/user/clients/do-add', [ClientsController::class, 'store'])->name('doaddclients');
Route::get("/user/clients/{id}/delete", [ClientsController::class, 'destroy'])->name("user.clients.delete");
Route::post("/user/clients/{id}/update", [FirmController::class, 'update'])->name("user.clients.update");
//});


