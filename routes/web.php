<?php

use Illuminate\Support\Facades\Route;
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

Route::get('/', function () {
    return view('welcome');
});


Route::get('/index', [EmployeeController::class, 'index'])->name('index');
Route::get('/show', [EmployeeController::class, 'show'])->name('show');
Route::post('/create', [EmployeeController::class, 'create'])->name('create');
Route::delete('/employee/delete/{id}', [EmployeeController::class, 'destroy'])->name('delete');
Route::get('/employee/edit/{employee}', [EmployeeController::class, 'edit'])->name('edit');
Route::put('/employee/update/{employee}', [EmployeeController::class, 'update'])->name('update');