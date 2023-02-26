<?php

namespace App\Http\Controllers;

use App\Models\Task;
use Illuminate\Http\Request;

class TaskController extends Controller
{
    public function index()
    {
        $tasks = Task::all()->sortBy('deadline');

        return view('index', compact('tasks'));
    }

    public function store(Request $request)
    {
        $validate = $request->validate([
            'task_name' => 'required',
            'deadline' => 'required'
        ]);

        Task::create([
            'task_name' => $request->task_name,
            'deadline' =>$request->deadline,
            'user_id' => auth()->id()
        ]);

        return redirect()->back();
    }

    public function delete($id)
    {
        Task::destroy($id);

        return redirect()->back();
    }

    public function done_task(Request $request, $id)
    {
        $task = Task::findOrFail($id);
        $task->is_done = 1;
        $task->save();

        return redirect()->back();
    }

    public function restore_task(Request $request, $id)
    {
        $task = Task::findOrFail($id);
        $task->is_done = 0;
        $task->save();

        return redirect()->back();
    }

}
