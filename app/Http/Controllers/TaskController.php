<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Task;
use App\Models\User;
use App\Repositories\TaskRepository;

class TaskController extends Controller
{
    protected $tasks;
    public function __construct(TaskRepository $tasks)
    {
        $this->middleware('auth');
        $this->tasks = $tasks;
    }

    public function index(Request $request)
    {
        return view('tasks.index', ['tasks' => $this->tasks->forUser($request->user())]);
    }
    public function store(Request $request)
    {
        $this->validate($request, ['name' => 'required|max:191']);
        $request->user()->tasks()->create(['name' => $request->name]);
        return redirect('/tasks');
    }
    public function search(Request $request)
    {
    }
}
