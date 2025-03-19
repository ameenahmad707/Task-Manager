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
        $request->validate([
            'title' => 'required|max:255',
        ]);

        Task::create([
            'title' => $request->title,
            'description' => $request->description,
        ]);

        return redirect()->back()->with('success', 'Task Created!');
    }

    public function edit($id)
    {
        $task = Task::find($id);

        if (!$task) {
            return redirect('/tasks')->with('error', 'Task not found');
        }

        return view('tasks.edit', compact('task'));
        return redirect('/tasks')->with('success', 'Task updated successfully!');
    }


    public function update(Request $request, Task $task)
    {
        $request->validate([
            'title' => 'required|max:255',
        ]);

        $task->update([
            'title' => $request->title,
            'description' => $request->description,
        ]);

        return redirect()->back()->with('success', 'Task Updated!');
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
        return redirect()->back()->with('success', 'Task Deleted!');
    }

}
