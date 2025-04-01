<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Task;

class TaskController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $tasks = Task::all(); // タスクを取得
        return view('tasks.index', compact('tasks')); // ビューにデータを渡す
    }


    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('tasks.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $request->validate([
            'title' => 'required|string|max:255',
        ]);

        Task::create([
            'title' => $request->title,
            'status' => 'not_started',  // デフォルトは「未着手」
        ]);

        return redirect()->route('tasks.index');
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        if ($task->user_id !== Auth::id()) {
            abort(403);
        }
        return view('tasks.edit', compact('task'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        if ($task->user_id !== Auth::id()) {
            abort(403);
        }

        $request->validate([
            'title' => 'required|max:255',
        ]);

        $task->update(['title' => $request->title]);
        return redirect()->route('tasks.index')->with('success', 'タスクを更新しました！');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy($id)
    {
        Task::findOrFail($id)->delete();
        return redirect()->route('tasks.index');
    }

    // タスクの状態を更新（進行中、完了）
    public function updateStatus($id, $status)
    {
        $task = Task::findOrFail($id);
        $task->status = $status;
        $task->save();

        return redirect()->route('tasks.index');
    }
}
