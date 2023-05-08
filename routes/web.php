<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\AuthController;
use App\Http\Controllers\UserController;
use App\Http\Controllers\CustomerController;



Route::get('/', [HomeController::class, 'index'])->name("view.home");
Route::get('/login', [AuthController::class, 'loginview'])->name("view.login");
Route::get('/register', [AuthController::class, 'registerview'])->name("view.register");
Route::post('/register', [AuthController::class, 'register'])->name("register");
Route::post('/login', [AuthController::class, 'login'])->name("login");

 //display form for employee to create new request
// Route::get('/customer/create', [CustomerController::class, 'create'])->name("view.create"); 
//store new request in database.
// Route::post('/customer', [CustomerController::class, 'store'])->name("createcustomer"); 

Route::resource("customer", CustomerController::class);


Route::middleware(['auth'])->group(function () {
    Route::get('/logout', [AuthController::class, 'logout'])->name("logout");
});
Route::middleware(['auth', 'admin'])->group(function () {
    Route::get('/admin', [AdminController::class, 'index'])->name("view.admin.home");
    Route::resource("users", UserController::class);
    
});