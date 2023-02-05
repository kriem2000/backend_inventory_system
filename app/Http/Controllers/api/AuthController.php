<?php

namespace App\Http\Controllers\api;

use Illuminate\Auth\AuthenticationException;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Gate;
use Illuminate\Support\Facades\Validator;

class AuthController extends BaseController
{
    /**
     * Login api
     *
     * @return \Illuminate\Http\Response
     */
    public function login(Request $request){

        Validator::validate($request->all(), [
            'email' => ['required', 'email'],
            'password' => ['required']
        ]);

        if (! Auth::attempt(['email' => $request->email, 'password' => $request->password])){
            throw new AuthenticationException('Unauthenticated', ['error' => 'Unauthenticated']);
        }

        if (! Gate::allows('isActive')) {
            return $this->sendError("Unauthorized");
        }

        return $this->sendResponse([
            'token' => Auth::user()->createToken('MyApp')->plainTextToken,
            'user' => Auth::user()->without('roles')->find(Auth::user()->id),
            'roles' => Auth::user()->getRoleNames()
        ], "Login Successful");
    }

    /**
     * Logout api
     * 
     * @return \Illuminate\Http\Response
     */
    public function logout(){
        if(Auth::user()->currentAccessToken()->delete()){
           return $this->sendResponse(null, "Logout Successful");
        }

        return $this->sendError("Failed to logout");
    }
}
