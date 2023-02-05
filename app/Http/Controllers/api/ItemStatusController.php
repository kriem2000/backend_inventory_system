<?php

namespace App\Http\Controllers\api;

use App\Http\Controllers\Controller;
use App\Models\ItemStatus;
use Illuminate\Http\Request;

class ItemStatusController extends Controller
{
    public function getAllItemStatus(){
        return ItemStatus::all();
    }
}
