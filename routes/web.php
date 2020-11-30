<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\PagesController;

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


Route::middleware(['auth:sanctum', 'verified'])->get('/dashboard', [PagesController::class, 'dashboard'])->name('dashboard');
Route::middleware(['auth:sanctum', 'verified'])->get('/payroll', [PagesController::class, 'payroll'])->name('payroll');

Route::get('/about', [PagesController::class, 'about'])->name('about');
Route::get('/', [PagesController::class, 'index'])->name('index');
