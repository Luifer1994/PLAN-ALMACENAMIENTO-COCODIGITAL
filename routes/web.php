<?php

use App\Http\Controllers\HomeController;
use App\Http\Controllers\LoginController;
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

Route::get('/', [HomeController::class, 'index']);

Route::get('/plan/register{id}', [HomeController::class, 'miPlan'])->name('plan.register');

Route::post('/logear', [LoginController::class, 'authenticate'])->name('loguear');

Route::get('/logout', [LoginController::class, 'logout'])->name('logout');

Route::middleware(['auth:sanctum', 'verified'])->get('/mis-archivos', [HomeController::class, 'dashboard'])->name('home');

Route::middleware(['auth:sanctum', 'verified'])->get('/myPlan', [HomeController::class, 'planPersonal'])->name('myPlan');

