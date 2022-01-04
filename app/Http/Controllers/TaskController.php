<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Task;
use Illuminate\Support\Facades\Auth;

use App\Http\Requests\TaskRequest;
class TaskController extends Controller
{
    public function getUsersTasks(){

        $userId = Auth::user()->id;

        $tasks = Task::where('user_id', $userId)->get();

        return $tasks;

    }


    public function addTask(TaskRequest $request){



        $task = new Task();

        $task->user_id = Auth::user()->id;
        $task->content = $request->content;

        $task->save();


        return ['success'=>"true", 'message'=>"Task added successfully"];

    }
}
