<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\TaskController;

Route::middleware(['auth'])->group(function () {
    // ログイン後は直接 Todo リスト画面へリダイレクト
    Route::get('/tasks', function () {
        return redirect()->route('tasks.index');
    });

    // タスクのルート
    Route::resource('tasks', TaskController::class);
    // プロフィール編集ページのルートを追加
    Route::get('/profile/edit', [ProfileController::class, 'edit'])->name('profile.edit');
});

// 認証関連のルート（ログイン、登録ページ）
require __DIR__.'/auth.php';
?>