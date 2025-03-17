<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            Task Manager
        </h2>
    </x-slot>

<!DOCTYPE html>
<html lang="en">
<head>
    <title>Task Manager</title>
    <link rel="stylesheet" href="{{ asset('css/style.css') }}">
</head>
<body>
    <div class="container">        
        <!-- Add Task Form -->
        <form action="/tasks" method="POST">
            @csrf
            <input type="text" name="title" placeholder="New Task" required>
            <button type="submit">Add</button>
        </form>

        <!-- Task List -->
        <ul>
            @foreach($tasks as $task)
                <li>
                    <div>
                        <a href="/tasks/{{ $task->id }}/edit" class="edit-btn">Edit</a>
                        <form action="/tasks/{{ $task->id }}" method="POST" style="display:inline;">
                            @csrf @method('DELETE')
                            <button type="submit" class="delete-btn">Delete</button>
                        </form>
                    </div>
                </li>
                <li>
                    <form action="/tasks/{{ $task->id }}/toggle" method="POST">
                        @csrf @method('PATCH')
                        <input type="checkbox" onchange="this.form.submit()" {{ $task->is_completed ? 'checked' : '' }}>
                    </form>
                    <span style="{{ $task->is_completed ? 'text-decoration: line-through;' : '' }}">
                        {{ $task->title }}
                    </span>
                </li>
                @if(session('success'))
                <div class="alert alert-success">
                    {{ session('success') }}
                </div>
                @endif
            @endforeach
            <p>Go Back to your <a href="{{ route('dashboard') }}">Dashboard</a></p>
        </ul>
    </div>

</body>
</html>
</x-app-layout>