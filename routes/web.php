<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\CitiesController;
use App\Http\Controllers\FirmController;
use \App\Http\Controllers\ClientsController;
use \App\Http\Controllers\InvoicesController;

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
Route::post('/logg', [FirmController::class, 'log'])->name('homee');
Route::post('/register', [FirmController::class, 'store'])->name('register');
Route::get('/login', function (){
   return view('pages.login');
})->name('login');

//rute za usere
Route::group(['middleware' => 'user'], function() {
Route::get('/user/profile', [FirmController::class, 'user'])->name('profile');
//rute za usere, deo sa klijentima
Route::get('/user/clients', [ClientsController::class, 'clients'])->name('clients');
Route::get('/user/clients', [ClientsController::class, 'show'])->name('clientsshow');
Route::get('/user/clients/add', [ClientsController::class, 'addclient'])->name('addclients');
Route::post('/user/clients/do-add', [ClientsController::class, 'store'])->name('doaddclients');
Route::get("/user/clients/{id}/delete", [ClientsController::class, 'destroy'])->name("user.clients.delete");
Route::post("/user/clients/{id}/update", [FirmController::class, 'update'])->name("user.clients.update");
//rute za usere, deo sa fakturama
Route::get('/user/invoices', [InvoicesController::class, 'show'])->name('invoices');
    Route::get('/user/invoices/add', [ClientsController::class, 'show'])->name('invoices');
  // Route::post('/user/invoices/add', [InvoicesController::class, 'addinvoice'])->name('addinvoices');
    Route::get( '/user/invoices/addinvoice', [InvoicesController::class, 'addinvoice'])->name('invoice');

   // Route::post('/user/invoices/do-add', [InvoicesController::class, 'store'])->name('doaddclients');
Route::get("/user/profile/logout", [FirmController::class, 'logout'])->name("logout");
});


