<?php

namespace App\Http\Controllers\api;

use App\Models\Building;
use App\Models\InventoryDestination;
use App\Models\TaskUser;
use App\Models\Unit;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Validator;

class DestinationController extends BaseController
{
    public function create(Request $request){

        /**
         * Edited 
         */
        Validator::validate($request->all(), [
            'unit_id' => ['exists:units,id,building_id,'.$request->build_id, 'unique:inventory_destinations,unit_id'],
            'build_id' => ['exists:buildings,id'],
        ]);

        $destination = InventoryDestination::create([
                'destination_status_id' => 2,
                'building_id' => $request->build_id,
                'unit_id' => $request->unit_id,
                'created_by_id' => Auth::user()->id,
                'inventory_group_id' => Auth::user()->inventory_group_id,
                'approved' => false
            ]);

        $this->assignUsers($request->users, $destination);

        $destintaion_relation = InventoryDestination::with(['tasks' => function ($query){
            $query->with(['created_by', 'task_status', 'items' => function ($query){
                $query->with('category', 'item_status', 'assigned_by', 'inventory_group', 'task')->get();
            }])->get();
        },'created_by', 'unit', 'assigned_users', 'unit.unitHead', 'building', 'inventory_group', 'approvedBy', 'destination_status'])
        ->find($destination->id);
        
        return $this->sendResponse($destintaion_relation, "Destination created successfully");
    }

    private function assignUsers($users, $destination){

        array_push($users, auth()->user()->id);

        foreach($users as $user){
            TaskUser::create([
                'user_id' => $user,
                'inventory_destination_id' => $destination->id,
                'inventory_group_id' => Auth::user()->inventory_group_id
            ]);
        }
        
    }

}
