<?php

namespace App\Http\Controllers\api;

use App\Http\Controllers\Controller;
use Spatie\Permission\Models\Role;

class RoleController extends BaseController
{
    public function getAllRoles(){
        return $this->sendResponse(Role::all(), 'Roles Retrieved');
    }
}
