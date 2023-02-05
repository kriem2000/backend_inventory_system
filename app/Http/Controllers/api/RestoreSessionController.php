<?php

namespace App\Http\Controllers\api;

use App\Http\Controllers\Controller;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class RestoreSessionController extends BaseController
{
    public function restore(){
        
        abort_if(!auth()->check(), 422, "Unauthenticated");

        return $this->sendResponse([
            'user' => Auth::user()->without('roles')->find(Auth::user()->id),
            'roles' => Auth::user()->getRoleNames()
        ], 'Credentials Restored');
    }
}
