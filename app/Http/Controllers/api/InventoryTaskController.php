<?php

namespace App\Http\Controllers\api;

use App\Http\Controllers\Controller;
use App\Models\InventoryDestination;
use App\Models\InventoryTask;

class InventoryTaskController extends Controller
{
    public function getAllTasks(){
        return InventoryTask::with('destination', 'task_status', 'unit', 'created_by', 'inventory_group');
    }

    public function getLatestTasks(){
        return InventoryTask::with('destination', 'task_status', 'unit', 'created_by', 'inventory_group')
            ->where('inventory_group_id', auth()->user()->inventory_group_id)
            ->get();
    }

    public function getLatestUserTasks(){
        return InventoryTask::with('destination', 'task_status', 'unit', 'created_by', 'inventory_group')
            ->where('inventory_group_id', auth()->user()->inventory_group_id)
            ->where('unit_id', auth()->user()->unit_id)
            ->get();
    }

    public function getDestinationTasks(InventoryDestination $destination){
        return InventoryTask::with(['items' => function($query){
            $query->with('category', 'item_status', 'assigned_by', 'inventory_group', 'task')->get();
        }, 'task_status', 'unit', 'unit.unitHead', 'created_by', 'inventory_group'])
            ->where('inventory_group_id', auth()->user()->inventory_group_id)
            ->where('inventory_destination_id', $destination->id)
            ->get();
    }
}
