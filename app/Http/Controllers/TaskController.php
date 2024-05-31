<?php

namespace App\Http\Controllers;

use App\Models\Task;
use App\Models\User;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Redirect;
use Inertia\Inertia;
use Inertia\Response;

class TaskController extends Controller
{

    public function show(): Response
    {

        $tasks = Task::all();

        return Inertia::render('Dashboard', [
            'tasks' => $tasks,
        ]);
    }

    public function edit(Request $request): Response
    {
        return Inertia::render('Task/Add', [
            'status' => session('status'),
        ]);
    }

    public function showDetail(Request $request): Response
    {
        $task = Task::find($request->query("task"));

        if  ($task){

            $user = User::find($task->user_id);

            return Inertia::render('Task/Detail', [
                'status' => session('status'),
                'task' => $task,
                'user' => $user->name
            ]);
        }

        return TaskController::show();

    }

    public function save(Request $request): RedirectResponse
    {

        Task::create([
            'title' => $request->title,
            'date' => $request->date,
            'description' => $request->description ?  $request->description : "",
            'user_id' => Auth::id()
        ]);

        return Redirect::route('dashboard');
    }


}
