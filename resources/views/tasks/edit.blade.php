<!doctype html>
<html lang="en">
  <head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <title>Task Manager - Edit Task</title>
    <link rel="stylesheet" href="{{ asset('css/style.css') }}">
  </head>
  <body>
  <div class="container">
    <h1>Edit Task</h1>

    <form action="/tasks/{{ $task->id }}" method="POST" style="display:inline;">
      @csrf @method('PUT')
      <input type="text" name="title" placeholder="Update Task" required>
      <textarea name="description" placeholder="Task Description"></textarea>
      <button type="submit">Update</button>
    </form>

    <p>Go Back to The <a href="/tasks">Task Manger</a></p>
  </div>
  </body>
</html>
