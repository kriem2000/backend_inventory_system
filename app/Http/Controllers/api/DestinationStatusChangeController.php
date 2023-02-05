<?php

namespace App\Http\Controllers\api;

use App\Models\InventoryDestination;
use Illuminate\Support\Facades\Gate;
use Illuminate\Support\Facades\Validator;

class DestinationStatusChangeController extends BaseController
{
    public function changeStatus(InventoryDestination $destination, $status_id){

        $destination_query = $destination->withCount(['tasks as ongoing_tasks' => function($query){
            $query->where('task_status_id', '!=', 1);
        }])->find($destination->id);

        if ($destination_query->ongoing_tasks > 0) {
            return $this->sendError('يجب الانتهاء من جميع عمليات الجرد القائمة');
        }

        if(Gate::allows('isApproved', [$destination, auth()->user()])){
            return $this->sendError('Remove approval to change status');
        }

        if(! Gate::allows('destination-creator', [$destination, auth()->user()])){
            return $this->sendError('Unauthorized');
        }

        Validator::validate(['status_id' => $status_id],[
            'status_id' => ['exists:task_status,id']
        ]);

        $destination->update([
            'destination_status_id' => $status_id
        ]);

        return $this->sendResponse($destination, 'Status changed successfully');
    }
}
