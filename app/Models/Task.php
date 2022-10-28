<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Task extends Model
{
    protected $fillable = ['title'  , 'description' , 'order' , 'status' , 'due_date' ];

    use HasFactory;
//one task ->many subtasks
    function tasks()
    {
     $this->hasMany(Task::class , 'task_id');
    }

    //at the same time , my task is a subtask of a bigger task
    function task()
    {
        $this->belongsToMany(Task::class , 'pivot_table');
    }

}
