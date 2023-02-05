<?php

namespace App\Http\Controllers\api;

use App\Http\Controllers\Controller;
use App\Models\Building;
use Illuminate\Http\Request;

class BuildingController extends BaseController
{
    public function getAllBuildings(){

        return Building::with(['units' => function($query){
            $query->with('inventory_destination')->get();
        }])->get();
    }
}