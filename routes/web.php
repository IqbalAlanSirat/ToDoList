<?php

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

// Route::get('/', function () {
//     return view('welcome');
// });

Auth::routes();

Route::get('/', [App\Http\Controllers\HomeController::class, 'index'])->name('home');
Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');
Route::post('/newtask', [App\Http\Controllers\ToDoListController::class, 'NewTask'])->name('NewTask');
Route::post('/edittask', [App\Http\Controllers\ToDoListController::class, 'EditTask'])->name('EditTask');
Route::post('/donetask', [App\Http\Controllers\ToDoListController::class, 'DoneTask'])->name('DoneTask');
Route::delete('/deletetask', [App\Http\Controllers\ToDoListController::class, 'DeleteTask'])->name('DeleteTask');
Route::get('/listtask', [App\Http\Controllers\ToDoListController::class, 'GetListTask'])->name('ListToDoList');
