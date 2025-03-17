<!DOCTYPE html>
<html lang="en">
<head>
    <title>Task Manager - Edit Task</title>
    <link rel="stylesheet" href="{{ asset('css/style.css') }}">
</head>
<body>
  <div class="container">
    <h1>Edit Task</h1>

    <form action="/tasks/{{ $task->id }}" method="POST">
        @csrf
        @method('PUT')
        <input type="text" name="title" value="{{ $task->title }}" required>
        <button type="submit">Update</button>
    </form>

    <a href="/tasks">Back to Tasks</a>
  </div>
</body>
</html>
