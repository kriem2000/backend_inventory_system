<?php

namespace App\Http\Controllers\api;

use App\Http\Controllers\Controller;
use App\Models\TaskStatus;
use Illuminate\Http\Request;

class TaskStatusController extends Controller
{
    public function getTaskStatus(){
        return TaskStatus::all();
    }
}
