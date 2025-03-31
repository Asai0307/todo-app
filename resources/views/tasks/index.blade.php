@extends('layouts.app')

@section('content')
<div class="container">
    <h1>タスク一覧</h1>
    <a href="{{ route('tasks.create') }}" class="btn btn-primary">新しいタスク</a>

    @if (session('success'))
        <div class="alert alert-success">{{ session('success') }}</div>
    @endif

    <ul class="list-group mt-3">
        @foreach($tasks as $task)
            <li class="list-group-item d-flex justify-content-between align-items-center">
                {{ $task->title }}
                <div>
                    <a href="{{ route('tasks.edit', $task) }}" class="btn btn-warning">編集</a>
                    <form action="{{ route('tasks.destroy', $task) }}" method="POST" class="d-inline">
                        @csrf
                        @method('DELETE')
                        <button type="submit" class="btn btn-danger">削除</button>
                    </form>
                </div>
            </li>
        @endforeach
    </ul>
</div>
@endsection
