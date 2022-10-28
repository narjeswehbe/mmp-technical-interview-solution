<?php

use App\Http\Controllers\TaskController;
use App\Models\Task;
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

Route::get('/', function () {
    return view('welcome' , ['tasks' => Task::all()]);
})->name('home');

Route::get('/tasks/create' , [TaskController::class , 'create'])->name('tasks.create');
Route::post('/tasks/create' , [TaskController::class , 'store'])->name('tasks.store');
Route::get('/tasks/edit/{id}' , [TaskController::class , 'edit'])->name('tasks.edit');
Route::put('/tasks/update/{id}' , [TaskController::class , 'update'])->name('tasks.update');
Route::delete('/tasks/delete/{id}' , [TaskController::class , 'destroy'])->name('tasks.delete');





