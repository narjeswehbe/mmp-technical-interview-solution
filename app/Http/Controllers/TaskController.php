<?php

namespace App\Http\Controllers;

use App\Http\Requests\TaskStoreRequest;
use App\Models\Task;
use Illuminate\Http\Request;

class TaskController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('./create' , ['tasks' => Task::all()]);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(TaskStoreRequest $request)
    {
        Task::create([
            'title' => $request->title,
            'description' => $request->description,
            'status' =>  $request->status,
            'order' => $request->order,
            'due_date' => $request->due_date ,
            'created_at' => $request->created_at ,
            'task_id' => $request->task_id,
        ]);

        return to_route('home');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $task = Task::find($id);
        return view('./edit' , ['task'=>$task]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $request->validate([
            'title' => ['required' , 'string'] ,
            'description' => ['required' , 'string'] ,
            'status' => ['required'] ,
            'order' => ['required' , 'numeric'] ,
            'due_date' => ['required'] ,
            // 'created_at' => ['required']

        ]);

        $task = Task::find($id);
        $task->update([
            'title' => $request->title,
            'description' => $request->description,
            'status' =>  $request->status,
            'order' => $request->order,
            'due_date' => $request->due_date ,
            'created_at' => $request->created_at ,
        ]);

        return to_route('home');

    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $task = Task::find($id);
        if($task!=null)
            $task->delete();
        return to_route('home');
     }
}
