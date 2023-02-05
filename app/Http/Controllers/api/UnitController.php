<?php

namespace App\Http\Controllers\api;

use App\Models\Unit;

class UnitController extends BaseController
{
    public function getAllUnits(){
        return $this->sendResponse(Unit::all(), 'Units Retreived');
    }
}
