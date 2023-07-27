<?php

use App\Http\Controllers\Admin;

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AuthController;
use App\Http\Controllers\EmployeeController;

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
Route::get('/', [EmployeeController::class, 'home'])->name('home');
Route::get('/dashboard', [Admin::class, 'index'])->name('index')->middleware('auth');
Route::put('activate/{id}', [Admin::class, 'activate'])->name('activate')->middleware('auth');

//Auth Controller
Route::controller(AuthController::class)->prefix('employee')->group(function () {
    Route::get('/login_show',  'show')->name('login');
    Route::post('/authenticate',  'authenticate')->name('authenticate');
    Route::post('/logout',  'logout')->name('logout');
});

//Employee Controller
Route::controller(EmployeeController::class)->prefix('employee')->middleware('auth')->group(function () {
    Route::get('/employee_page',  'employee_page')->name('employee_page');
    Route::get('/profile',  'profile')->name('profile');
    Route::post('/update_details/{id}',  'update_details')->name('update_details');
    Route::post('/password_update/{user}',  'password_update')->name('password_update');
});


//Admin Controller

Route::controller(Admin::class)->prefix('admin')->middleware('auth','admin')->group(function () {
   
    Route::get('/show', 'show')->name('show');
    Route::post('/create',  'create')->name('create');
    Route::delete('/delete/{id}', 'destroy')->name('delete');
    Route::get('/edit/{employee}',  'edit')->name('edit');
    Route::put('/update/{employee}', 'update')->name('update');
    Route::get('credit_show/{id}', 'credit_show')->name('credit_show');
    Route::put('/credit/{id}', 'credit')->name('credit');
});
