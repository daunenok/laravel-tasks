<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Task;
use App\Repositories\TaskRepository;

class TaskController extends Controller
{
    //
    protected $tasks;

    public function __construct(TaskRepository $tasks) {
    	$this->middleware("auth");
        $this->tasks = $tasks;
    }

    public function index(Request $request) {
    	return view('welcome', ["tasks" => $this->tasks->forUser($request->user())]);
    }

    public function store(Request $request) {
    	$this->validate($request, ['task' => "required|max:255"]);
 
		$request->user()->tasks()->create(["name" => $request->task]);

		return redirect('/');
	}

    public function destroy(Request $request, Task $task) {
        $this->authorize('destroy', $task);
        $task->delete();
        return redirect('/');
    }
}
