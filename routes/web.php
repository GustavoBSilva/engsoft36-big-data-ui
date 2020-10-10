<?php

use App\Http\Controllers\DashboardController;
use App\Http\Controllers\Fase1Controller;
use App\Http\Controllers\Fase2Controller;
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

Route::get('/', [DashboardController::class, 'index'])->name('dashboard');

Route::get('/fase1', [Fase1Controller::class, 'index']);
Route::get('/fase1/{cpf}', [Fase1Controller::class, 'show']);

Route::get('/fase2', [Fase2Controller::class, 'index']);
Route::get('/fase2/{cpf}', [Fase2Controller::class, 'show']);

Route::get('/logout', function () { return view('dashboard.home'); })->name('logout');