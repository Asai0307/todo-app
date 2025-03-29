<?php

use App\Http\Controllers\TaskController;

Route::get('/', function () {
    return view('welcome');
});

// Route::get('/tasks',function(){
//     return view('tasks.index');
// });
Route::get('/tasks', [TaskController::class,'index'])->name('tasks.index');
Route::get('/tasks/create', [TaskController::class,'create'])->name('tasks.create');
Route::delete('/tasks/destroy', [TaskController::class,'destroy'])->name('tasks.destroy');

// 一括定義
// Route::resource('tasks', TaskController::class);