<!DOCTYPE html>
<html lang="ja">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Todoリスト</title>
</head>
<body>
    <h1>Todoリスト</h1>
    <a href="{{ route('tasks.create') }}">新しいタスク</a>
    <ul>
        @foreach($tasks as $task)
            <li>
                {{ $task->title }}
                <form action="{{ route('tasks.destroy', $task->id) }}" method="POST" style="display:inline;">
                    @csrf
                    @method('DELETE')
                    <button type="submit">削除</button>
                </form>
            </li>
        @endforeach
    </ul>
</body>
</html>
