<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Task;
use App\Http\Requests\TaskRequest;

class TaskController extends Controller
{
    public function __construct() {
        $this->middleware('auth');
    }

    public function index(Request $request) {
        $tasks = Task::where('user_id', $request->user()->id)->get();
        return view('tasks.index', compact('tasks'));
    }

    public function store(TaskRequest $request) {              
        $request->user()->tasks()->create([
            'title' => $request->title
        ]);

        return redirect('/tasks');
    }

    public function destroy(Task $task) {
        $task->delete();

        return redirect('/tasks');
    }
}
