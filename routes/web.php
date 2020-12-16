<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\PagesController;
use App\Http\Livewire\payroll;
use App\Http\Livewire\BusinessShow;
use App\Http\Controllers\UsersController;
use App\Http\Controllers\BusinessesController;
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
//Route::post('/contact', [ContactUsFormController::class, 'ContactUsForm'])->name('contact.store');

Route::middleware(['auth:sanctum', 'verified'])->get('/dashboard', [PagesController::class, 'dashboard'])->name('dashboard');
Route::middleware(['auth:sanctum', 'verified'])->get('/payroll', payroll::class)->name('payroll');

Route::get('/about', [PagesController::class, 'about'])->name('about');
Route::get('/', [PagesController::class, 'index'])->name('index');
Route::get('/business/{id}/show', [BusinessShow::class, 'render'])->name('business.show');

Route::put('/users/updateCurrentBusiness/{id}', [UsersController::class, 'update'])->name('users.updateCurrentBusiness');
