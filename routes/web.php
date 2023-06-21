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
Route::get('/', [EmployeeController::class, 'index']);


Route::controller(EmployeeController::class)->prefix('employee')->group(function () {
    Route::get('/',  'index')->name('index');
    Route::get('/show', 'show')->name('show');
    Route::post('/create',  'create')->name('create');
    Route::delete('/delete/{id}', 'destroy')->name('delete');
    Route::get('/edit/{employee}',  'edit')->name('edit');
    Route::put('/update/{employee}', 'update')->name('update');
    Route::get('/show_wallet/{id}', 'show_wallet')->name('show_wallet');
    Route::put('activate/{id}', 'activate')->name('activate');
    Route::get('credit_show/{id}', 'credit_show')->name('credit_show');
    Route::put('/credit/{id}', 'credit')->name('credit');
});
