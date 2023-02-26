<?php

use App\Http\Controllers\TaskController;
use App\Http\Controllers\UserController;
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
    return view('login');
})->name('login-page');

Route::post('/login', [UserController::class, 'login'])->name('login');

Route::get('/register', function(){
    return view('register');
})->name('register-page');
Route::post('/register', [UserController::class, 'register'])->name('register');



Route::middleware(['is_user'])->group(function(){
    Route::get('/home', [TaskController::class, 'index'])->name('home');
    Route::post('/new-task', [TaskController::class, 'store'])->name('new_task');
    Route::delete('/delete-task/{id}', [TaskController::class, 'delete']);
    Route::patch('/task-done/{id}', [TaskController::class, 'done_task']);
    Route::patch('/task-restore/{id}', [TaskController::class, 'restore_task']);
    Route::post('/logout', [UserController::class, 'logout'])->name('logout');
});