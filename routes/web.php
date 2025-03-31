<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\TaskController;

Route::middleware(['auth'])->group(function () {
    // ログイン後は直接 Todo リスト画面へリダイレクト
    Route::get('/', function () {
        return redirect()->route('tasks.index');
    });

    // タスクのルート
    Route::resource('tasks', TaskController::class);
});

// 認証関連のルート（ログイン、登録ページ）
require __DIR__.'/auth.php';
?>