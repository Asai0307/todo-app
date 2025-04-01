@extends('layouts.app')

@section('content')
    <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
        <h1 class="text-2xl font-semibold mb-4">Todoリスト</h1>

        <!-- 新規タスク追加フォーム -->
        <form action="{{ route('tasks.store') }}" method="POST" class="mb-4">
            @csrf
            <input type="text" name="title" class="border border-gray-300 p-2 rounded" placeholder="新しいタスクを追加" required>
            <button type="submit" class="ml-2 bg-blue-500 text-white p-2 rounded">追加</button>
        </form>

        <!-- タスクの一覧 -->
        <ul>
            @foreach ($tasks as $task)
                <li class="flex items-center justify-between mb-2">
                    <form action="{{ route('tasks.toggle', $task->id) }}" method="POST" class="flex items-center">
                        @csrf
                        @method('PATCH')
                        <input type="checkbox" onchange="this.form.submit()" {{ $task->is_completed ? 'checked' : '' }}>
                    </form>
                    <span class="{{ $task->is_completed ? 'line-through text-gray-500' : '' }} flex-1 ml-4">{{ $task->title }}</span>
                    <form action="{{ route('tasks.destroy', $task->id) }}" method="POST">
                        @csrf
                        @method('DELETE')
                        <button type="submit" class="text-red-500">削除</button>
                    </form>
                </li>
            @endforeach
        </ul>
    </div>
@endsection
