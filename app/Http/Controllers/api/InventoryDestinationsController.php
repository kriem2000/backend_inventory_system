<?php

namespace App\Http\Controllers\api;

use App\Models\InventoryDestination;
use App\Models\TaskUser;
use App\Models\User;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Gate;

class InventoryDestinationsController extends BaseController
{
    public function getAllDestinations(){

        if(Auth::user()->hasRole('Admin')){
            return InventoryDestination::with(['tasks' => function ($query){
                $query->with(['created_by', 'task_status', 'items' => function ($query){
                    $query->with('category', 'item_status', 'assigned_by', 'inventory_group', 'task')->get();
                }])->get();
            },'created_by', 'assigned_users', 'unit', 'unit.unitHead', 'building', 'inventory_group', 'approvedBy', 'destination_status'])
            ->orderBy('created_at', 'desc')
            ->get();
        }
        
        if(Auth::user()->hasRole('Inventory Member') && Auth::user()->isHead){

            $destinations = TaskUser::where('user_id', auth()->user()->id)->get()->pluck('inventory_destination_id')->toArray();
            $user_unit_destination = User::with(['unit' => function($query){
                $query->with('inventory_destination')->get();
            }])->where('id', auth()->user()->id)->get()->pluck('unit')->pluck('inventory_destination')[0]->id;

            array_push($destinations, $user_unit_destination);

            return InventoryDestination::with(['tasks' => function ($query){
                $query->with(['created_by', 'task_status', 'items' => function ($query){
                    $query->with('category', 'item_status', 'assigned_by', 'inventory_group', 'task')->get();
                }])->get();
            },'created_by', 'unit', 'unit.unitHead', 'assigned_users', 'building', 'inventory_group', 'approvedBy', 'destination_status'])
            ->whereIn('id', $destinations)
            ->get();
        }

        if (Auth::user()->hasRole('Inventory Member')) {
            return User::with(['destinations' => function($query){
                $query->with(['tasks' => function ($query){
                    $query->with(['created_by', 'task_status', 'items' => function ($query){
                        $query->with('category', 'item_status', 'assigned_by', 'inventory_group', 'task')->get();
                    }])->get();
                },'created_by', 'unit', 'unit.unitHead', 'assigned_users', 'building', 'inventory_group', 'approvedBy', 'destination_status'])->get();
            }])
                ->where('id', auth()->user()->id)
                ->get()->flatten()->pluck('destinations')[0];
        }

        if(Auth::user()->isHead){
            return InventoryDestination::with(['tasks' => function ($query){
                $query->with(['created_by', 'task_status', 'items' => function ($query){
                    $query->with('category', 'item_status', 'assigned_by', 'inventory_group', 'task')->get();
                }])->get();
            },'created_by', 'unit', 'unit.unitHead', 'assigned_users', 'building', 'inventory_group', 'approvedBy', 'destination_status'])
            ->where('unit_id', Auth::user()->unit_id)
            ->orderBy('created_at', 'desc')
            ->get();
        }   
    }

    public function getDestination($id){
        return InventoryDestination::with('tasks', 'assigned_users' ,'created_by', 'unit', 'building', 'inventory_group', 'approvedBy', 'destination_status')
            ->find($id);
    }

    public function approve(InventoryDestination $destination){

        if (! Gate::forUser(auth()->user())->allows('isFinished', [$destination, auth()->user()])) {
            return $this->sendError('Unauthorized, task must be set to finished');
        }

        if (Gate::allows('isUnitHead', [$destination, auth()->user()])) {
            return $this->sendError('Unauthorized, must be unit head');
        }

        $destination->update([
            'approved_by_id' => (!$destination->approved) ? auth()->user()->id : null,
            'approved' => ! $destination->approved
        ]);

        return $this->sendResponse($destination, 'Destination approved');
    }
}
