<?php

namespace App\Http\Controllers\api;

use App\Models\InventoryDestination;
use App\Models\Item;
use Illuminate\Support\Facades\Gate;

class TestController extends BaseController
{
    public function index(){
        
        // return InventoryDestination::with(['tasks' => function($query) {
        //     $query->with(['items' => function($query){
        //         $query->where('category_id', request('category_id') ?? '%');
        //     }]);
        // }])
        // ->where('building_id', $request->building_id ?? '%')
        // ->where('unit_id', $request->unit_id ?? '%')
        // ->get()->pluck('tasks')->map->pluck('items')->flatten();
        
    }
}
