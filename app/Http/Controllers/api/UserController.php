<?php

namespace App\Http\Controllers\api;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Validator;
use Illuminate\Validation\Rule;

class UserController extends BaseController
{
    public function getAllUsers(Request $request){
        return User::with('roles', 'unit', 'inventory_group')
            ->where('name', 'LIKE', "%{$request->search}%")
            ->get();
    }

    public function register(Request $request){

        Validator::validate($request->all(), [
            'name' => ['required'],
            'email' => ['required', 'email', 'unique:users'],
            'password' => ['required', 'min:5'],
            'confirmed_password' => ['required', 'same:password'],
            'role' => ['required', 'exists:roles,name'],
            'unit_id' => ['required', 'exists:units,id'],
        ]);
        
        $user = User::create([
            'name' => $request->name,
            'nickname' => $request->nickname,
            'phone_number' => $request->phone_number,
            'email' => $request->email,
            'password' => Hash::make($request->password),
            'unit_id' => $request->unit_id,
            'isHead' => false,
            'inventory_group_id' => 1,
            'isActive' => true
        ]);

        $user->syncRoles($request->role);

        return $this->sendResponse([
            'token' => $user->createToken('MyApp')->plainTextToken,
            'user' => $user->without('roles')->find($user->id),
            'roles' => $user->getRoleNames()
        ], 'User Registered Successfully');
    }

    public function update(User $user, Request $request){

        Validator::validate($request->all(), [
            'email' => ['email', Rule::unique('users')->ignore($user->id)],
            'role' => ['exists:roles,name'],
            'password' => [Rule::unique('users')->ignore($request->user_id)],
            'unit_id' => ['exists:units,id']
        ]);

        $user->update([
            'name' => $request->name ?? $user->name,
            'nickname' => ($request->nickname == null) ? "" : $user->nickname ,
            'phone_number' => $request->phone_number ?? $user->phone_number,
            'email' => $request->email ?? $user->email ,
            'password' => $request->password ? Hash::make($request->password) : $user->password,
            'unit_id' => $request->unit_id ?? $user->unit_id,
            'isHead' => $user->isHead,
            'inventory_group_id' => 1 
        ]);

        if ($request->role) {
            $user->syncRoles($request->role);
        }

        return $this->sendResponse([
            'user' => Auth::user()->without('roles')->find(Auth::user()->id),
            'roles' => Auth::user()->getRoleNames()
        ], 'User Updated Successfully');

    }

    public function active(User $user){

        $user->update([
            'isActive' => !$user->isActive
        ]);

        return $this->sendResponse($user, 'User has state has been changed');
    }

    public function getAllMembers(){
        return User::where('id', '!=', Auth::user()->id)->role('Inventory Member')->where('isActive', true)->get();
    }
}
