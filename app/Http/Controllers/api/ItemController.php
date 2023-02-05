<?php

namespace App\Http\Controllers\api;

use App\Http\Controllers\api\BaseController;
use App\Models\InventoryDestination;
use App\Models\InventoryTask;
use App\Models\Item;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Gate;
use Illuminate\Support\Facades\Validator;

class ItemController extends BaseController
{
    public function create(Request $request, InventoryTask $inventory_task){
        
        if (! Gate::allows('task-creator', [$inventory_task, auth()->user()])) {
            return $this->sendError('Unauthorized');
        }

        $destination = InventoryDestination::find($inventory_task->inventory_destination_id);

        if (Gate::allows('isFinished', [$destination, auth()->user()])) {
            return $this->sendError('Cannot insert items to a finished destination');
        }

        if(Gate::allows('taskIsFinished', [$inventory_task, auth()->user()])){
            return $this->sendError('Cannot insert items to a finished tasks');
        }

        Validator::validate($request->all(), [
            'category_id' => ['exists:item_categories,id'],
            'status_id' => ['exists:item_status,id'],
            'item_name' => ['required'],
            'quantity' => ['required'],            
        ]);

        $item = Item::create([
                'category_id' => $request->category_id,
                'user_id' => Auth::user()->id,
                'status_id' => $request->status_id,
                'inventory_group_id' => $inventory_task->inventory_group_id,
                'inventory_task_id' => $inventory_task->id,
                'item_name' => $request->item_name,
                'quantity' => $request->quantity,
                'item_note' => $request->item_note,
                'item_owner' => $request->item_owner
            ]);

        return $this->sendResponse($item, "Item created successfully");
    }

    public function update(Request $request, InventoryTask $task, Item $item){

        if (! Gate::allows('task-creator', [$task, auth()->user()])) {
            return $this->sendError('Unauthorized');
        }

        $destination = InventoryDestination::find($task->inventory_destination_id);

        if (Gate::allows('isFinished', [$destination, auth()->user()])) {
            return $this->sendError('Cannot insert items to a finished destination');
        }

        if(Gate::allows('taskIsFinished', [$task, auth()->user()])){
            return $this->sendError('Cannot update items to a finished tasks');
        }

        Validator::validate($request->all(), [
            'category_id' => ['exists:item_categories,id'],
            'status_id' => ['exists:item_status,id'],
            'item_name' => ['required']
        ]);

        $item->update([
            'category_id' => $request->category_id ?? $item->category_id,
            'status_id' => $request->status_id ?? $item->status_id,
            'item_name' => $request->item_name,
            'quantity' => $request->quantity,
            'item_note' => $request->item_note,
            'item_owner' => $request->item_owner
        ]);

        return $this->sendResponse($item, "Item updated successfully");
    }

    public function delete(InventoryTask $task, Item $item){
        if (! Gate::check('task-creator', [$task, auth()->user()])) {
            return $this->sendError('Unauthorized');
        }

        $destination = InventoryDestination::find($task->inventory_destination_id);

        if (Gate::allows('isFinished', [$destination, auth()->user()])) {
            return $this->sendError('Cannot insert items to a finished destination');
        }

        if(Gate::allows('taskIsFinished', [$task, auth()->user()])){
            return $this->sendError('لا يمكن حذف عناصر لمهمة حالتها مُنجزة');
        }

        if(!$item->delete()){
            return $this->sendError("Failed to delete");
        }

        return $this->sendResponse(null, 'Item Deleted Successfully');
    }

    public function getAllItems(InventoryTask $inventory_task){

        return Item::with('category', 'item_status', 'assigned_by', 'inventory_group', 'task')
                ->where('inventory_task_id', $inventory_task->id)
                ->get();
    }
}
