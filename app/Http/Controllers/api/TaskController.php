<?php

namespace App\Http\Controllers\api;

use App\Models\InventoryDestination;
use App\Models\InventoryTask;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Gate;
use Illuminate\Support\Facades\Validator;

class TaskController extends BaseController
{
    public function create(InventoryDestination $inventory_destination, Request $request){

        if (Gate::allows('isFinished', [$inventory_destination, auth()->user()])) {
            return $this->sendError('Cannot create tasks to finished destinations');
        }

        // if(! Gate::allows('destination-creator', [auth()->user(), $inventory_destination])){
        //     return $this->sendError('Unauthorized');
        // }

        Validator::validate($request->all(),[
            'sub_unit' => ['required', 'min:5', 'max:100'],
            'description' => ['string', 'nullable'],
        ]);

        $task = InventoryTask::create([
                'task_status_id' => 2,
                'created_by_id' => Auth::user()->id,
                'unit_id' => $inventory_destination->unit_id,
                'inventory_destination_id' => $inventory_destination->id,
                'sub_unit_name' => $request->sub_unit,
                'sub_unit_desc' => $request->description ?? "",
                'inventory_group_id' => Auth::user()->inventory_group_id
            ]);

        return $this->sendResponse($task, 'Task created successfully');
    }
}
