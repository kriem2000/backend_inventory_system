<?php

namespace App\Http\Controllers\api;

use App\Http\Controllers\Controller;
use App\Models\InventoryDestination;
use App\Models\Item;
use App\Models\Unit;
use Illuminate\Database\Eloquent\Collection;
use Illuminate\Http\Request;
use Illuminate\Pagination\LengthAwarePaginator;
use Illuminate\Pagination\Paginator;
use Illuminate\Support\Facades\DB;

class StatisticsController extends BaseController
{
    public function all_stats(Request $request){
        return [
            'all_units' => Unit::all()->count(),
            'finished_units' => InventoryDestination::where('destination_status_id', 1)->count(),
            'items' => Item::all()->count()
        ];
    }

    public function filter($building_id = '%', $unit_id = '%', $category_id = '%'){


        $items = DB::select(
            "SELECT items.* , item_categories.category_name, item_status.status_name, users.name AS assigned_by, units.unit_name 
            FROM items 
            INNER JOIN item_categories 
            ON item_categories.id = items.category_id
            INNER JOIN item_status
            ON item_status.id = items.status_id
            INNER JOIN users
            ON users.id = items.user_id
            INNER JOIN inventory_tasks
            ON items.inventory_task_id = inventory_tasks.id
            INNER JOIN units
            ON inventory_tasks.unit_id = units.id
            
            WHERE items.inventory_task_id IN 
            (SELECT id FROM inventory_tasks WHERE inventory_destination_id 
                IN (SELECT id FROM inventory_destinations WHERE unit_id LIKE '$unit_id' AND building_id LIKE  '$building_id'))
            
            AND item_categories.id LIKE '$category_id';"  
        );

        return $this->paginate($items, 10, options: [
            'path' => "http://192.168.132.105:8000/api/item-statistics/$building_id/$unit_id/$category_id"
        ]);
    }

    public function all_items($building_id = '%', $unit_id = '%', $category_id = '%'){
        $items = DB::select(
            "SELECT items.* , item_categories.category_name, item_status.status_name, users.name AS assigned_by, units.unit_name 
            FROM items 
            INNER JOIN item_categories 
            ON item_categories.id = items.category_id
            INNER JOIN item_status
            ON item_status.id = items.status_id
            INNER JOIN users
            ON users.id = items.user_id
            INNER JOIN inventory_tasks
            ON items.inventory_task_id = inventory_tasks.id
            INNER JOIN units
            ON inventory_tasks.unit_id = units.id
            
            WHERE items.inventory_task_id IN 
            (SELECT id FROM inventory_tasks WHERE inventory_destination_id 
                IN (SELECT id FROM inventory_destinations WHERE unit_id LIKE '$unit_id' AND building_id LIKE  '$building_id'))
            
            AND item_categories.id LIKE '$category_id';"  
        );

        return $items;
    }
    
    private function paginate($items, $perPage = 5, $page = null, $options = [])
    {
        $page = $page ?: (Paginator::resolveCurrentPage() ?: 1);
        $items = $items instanceof Collection ? $items : Collection::make($items);
        return new LengthAwarePaginator($items->forPage($page, $perPage), $items->count(), $perPage, $page, $options);
    }
}
