<?php

namespace App\Http\Controllers\api;

use App\Http\Controllers\Controller;
use App\Models\InventoryDestination;
use App\Models\InventoryTask;
use Illuminate\Support\Facades\Gate;
use Illuminate\Support\Facades\Validator;

class TaskStatusChangeController extends BaseController
{
    public function changeStatus(InventoryTask $inventory_task, $status_id){

        if(! Gate::allows('task-creator', [$inventory_task, auth()->user()])){
            return $this->sendError('Unauthorized');
        }

        $destination = InventoryDestination::find($inventory_task->inventory_destination_id);

        if (Gate::allows('isFinished', [$destination, auth()->user()])) {
            return $this->sendError('Cannot insert items to a finished destination');
        }

        Validator::validate(['task_status_id' => $status_id],[
            'task_status_id' => ['exists:task_status,id']
        ]);

        $inventory_task->update([
            'task_status_id' => $status_id
        ]);

        return $this->sendResponse($inventory_task, 'Status changed successfully');
    }
}
