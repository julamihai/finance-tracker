<?php

use Illuminate\Support\Facades\Route;

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
//dashboard
Route::middleware('auth')->group(function() {
    Route::get('/',[\App\Http\Controllers\DashboardController::class,'index'])->name('dashboard');
    //categories-routes
    Route::get('/categories/index',[\App\Http\Controllers\CategoriesController::class,'index'])->name('categories.index');
    Route::get('/categories/create',[\App\Http\Controllers\CategoriesController::class,'create'])->name('categories.create');
    Route::post('/categories/categories',[\App\Http\Controllers\CategoriesController::class,'store'])->name('categories.store');
    Route::get('/categories/edit/{id}',[\App\Http\Controllers\CategoriesController::class,'edit'])->name('categories.edit');
    Route::put('/categories/update/{id}',[\App\Http\Controllers\CategoriesController::class,'update'])->name('categories.update');
    Route::get('/categories/destroy/{id}',[\App\Http\Controllers\CategoriesController::class,'destroy'])->name('categories.destroy');

    //income routes
    Route::get('/income',[\App\Http\Controllers\IncomeController::class,'index'])->name('income.index');
    Route::get('/income/create',[\App\Http\Controllers\IncomeController::class,'edit'])->name('income.create');
    Route::post('/income/store',[\App\Http\Controllers\IncomeController::class,'store'])->name('income.store');
    Route::get('/income/edit/{id}',[\App\Http\Controllers\IncomeController::class,'edit'])->name('income.edit');
    Route::put('/income/update/{id}',[\App\Http\Controllers\IncomeController::class,'update'])->name('income.update');
    Route::get('/income/destroy/{id}',[\App\Http\Controllers\IncomeController::class,'destroy'])->name('income.destroy');

    //expense routes
    Route::get('/expense',[\App\Http\Controllers\ExpenseController::class,'index'])->name('expense.index');
    Route::get('/expense/create',[\App\Http\Controllers\ExpenseController::class,'edit'])->name('expense.create');
    Route::post('/expense/store',[\App\Http\Controllers\ExpenseController::class,'store'])->name('expense.store');
    Route::get('/expense/edit/{id}',[\App\Http\Controllers\ExpenseController::class,'edit'])->name('expense.edit');
    Route::put('/expense/update/{id}',[\App\Http\Controllers\ExpenseController::class,'update'])->name('expense.update');
    Route::get('/expense/destroy/{id}',[\App\Http\Controllers\ExpenseController::class,'destroy'])->name('expense.destroy');
});

//register routes
Route::get('/login',[\App\Http\Controllers\AuthController::class, 'getlogin'])->name('login.index');
Route::get('/register',[\App\Http\Controllers\AuthController::class, 'getregister'])->name('register.index');
Route::post('/register',[\App\Http\Controllers\AuthController::class, 'register'])->name('register');
Route::post('/login',[\App\Http\Controllers\AuthController::class, 'login'])->name('login');
Route::get('/logout',[\App\Http\Controllers\AuthController::class, 'logout'])->name('logout');


