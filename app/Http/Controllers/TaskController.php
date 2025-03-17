<?php

namespace App\Http\Controllers;

use App\Models\Task;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class TaskController extends Controller
{
    public function index()
    {
        $tasks = Task::all();
        return view('tasks.index', compact('tasks'));
    }

    public function store(Request $request)
    {
        $request->validate(['title' => 'required']);
        Task::create($request->all());
        return redirect('/tasks');
    }

    public function edit($id)
    {
        $task = Task::find($id);

        if (!$task) {
            return redirect('/tasks')->with('error', 'Task not found');
        }

        return view('tasks.edit', compact('task'));
    }


    public function update(Request $request, Task $task)
    {
        $task->update($request->all());
        return redirect('/tasks');
    }

    public function toggleComplete($id)
    {
        $task = Task::find($id);
        $task->is_completed = !$task->is_completed;
        $task->save();

        return redirect('/tasks')->with('success', 'Task updated successfully!');

    }


    public function destroy(Task $task)
    {
        $task->delete();
        return redirect('/tasks');
    }
}
