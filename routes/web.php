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

Route::get('/', function () {
    return redirect()->route('welcome');
});

Route::get('/todolist', [\App\Http\Controllers\Controller::class, 'index'])->name('welcome');
Route::post('/todolist/add', [\App\Http\Controllers\Controller::class, 'add'])->name('t.add');
Route::post('/todolist/delete', [\App\Http\Controllers\Controller::class, 'delete'])->name('t.del');
Route::post('/todolist/edit', [\App\Http\Controllers\Controller::class, 'edit'])->name('t.edit');