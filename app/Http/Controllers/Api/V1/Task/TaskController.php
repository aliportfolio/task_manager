<?php

namespace App\Http\Controllers\Api\V1\Task;

use App\Http\Controllers\Controller;
use App\Http\Requests\Api\V1\TaskRequest;
use App\Models\Task;
use App\Traits\Api\V1\ApiResponse;
use Illuminate\Http\Request;

class TaskController extends Controller
{
    use ApiResponse;

    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $tasks = auth()->user()->tasks;
        return $this->sendSuccess($tasks, "Show Successfully");
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(TaskRequest $request)
    {
        $data = $request->validated();

        $data['user_id'] = auth()->id();

        $task = Task::create($data);

        return $this->sendSuccess($task, "Stored Successfully");
    }

    /**
     * Display the specified resource.
     */
    public function show(Task $task)
    {
        return $this->sendSuccess($task, "Show Successfully");
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Task $task)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(TaskRequest $request, Task $task)
    {
        $task->update($request->validated());
        return $this->sendSuccess([], "Updated Successfully");
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Task $task)
    {
        $task->delete();
        return $this->sendSuccess([], "Deleted Successfully");
    }

    public function changeStatus(Task $task)
    {
        if($task->status == 'new')
            $task->update(['status' => 'completed']);
        else
            $task->update(['status' => 'new']);

        return $this->sendSuccess($task, "Updated Successfully");
    }
}
