<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\AuthController;
use App\Http\Controllers\UserController;
use App\Http\Controllers\CustomerController;
use App\Http\Controllers\ManagerController;
use App\Http\Controllers\EmployeeController;
use App\Http\Controllers\VacationController;
use App\Http\Controllers\LeaveController;



Route::get('/', [HomeController::class, 'index'])->name("view.home");
Route::get('/login', [AuthController::class, 'loginview'])->name("view.login");
Route::get('/register', [AuthController::class, 'registerview'])->name("view.register");
Route::post('/register', [AuthController::class, 'register'])->name("register");
Route::post('/login', [AuthController::class, 'login'])->name("login");


Route::resource("customer", CustomerController::class);
Route::resource('vacation', VacationController::class);
Route::resource('leave', LeaveController::class);



Route::middleware(['auth'])->group(function () {
    Route::get('/logout', [AuthController::class, 'logout'])->name("logout");
});
Route::middleware(['auth', 'admin' ])->group(function () {
    Route::get('/admin', [AdminController::class, 'index'])->name("view.admin.home");
    Route::resource("users", UserController::class);
    
});
Route::middleware(['auth', 'employee'])->group(function(){ 
    Route::get('/employee', [EmployeeController::class, 'index'])->name("view.employee.home");
    Route::post('/customer/create',[CustomerController::class, 'store'])->name("customer.store");
    Route::get('/customer',[CustomerController::class, 'index'])->name("customer.index");
    // Route::resource("customer", CustomerController::class);
    
});

Route::middleware(['auth', 'manager'])->group(function(){ 
    Route::get('/manager', [ManagerController::class, 'index'])->name("view.manager.home");
    Route::get('/customer',[CustomerController::class, 'index'])->name("customer.index");
    // Route::resource("customer", CustomerController::class);
    // Route::put('customer',[CustomerController::class,'update'])->name('customer.update');
    // Route::resource('vacation', VacationController::class);
    
});