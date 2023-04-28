<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\AuthController;
use App\Http\Controllers\DaysOffController;
use App\Models\DaysOff;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
*/

//  Route::get('/', function () {
//     return view('welcome');
//  });

Route::get('/', [HomeController::class, 'index'])->name("view.home");
Route::get('/login', [AuthController::class, 'loginview'])->name("view.login");
Route::get('/register', [AuthController::class, 'registerview'])->name("view.register");
Route::post('/register', [AuthController::class, 'register'])->name("register");
Route::get('/daysoff', [DaysOffController::class, 'daysoffview'])->name("view.daysoff");
// Route::post('/daysoff', [DaysOffController::class, 'daysoff'])->name("daysoff");
Route::post('/login', [AuthController::class, 'login'])->name("login");
Route::middleware(['auth'])->group(function () {
    Route::get('/logout', [AuthController::class, 'logout'])->name("logout");

});