<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Models\User;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;

class UserController extends Controller
{
    function getAll() {
        $users = User::with('roles')->get();
        $data = [
            "status" => "success",
            "users" => $users
        ];
        return response()->json($data);
    }

    function store(Request $request) {
        $user = new User();
        $user->name = $request->name;
        $user->email = $request->email;
        $user->password = Hash::make($request->email);
        $user->save();

        //them role user
        $user->roles()->sync($request->roles);
        $data = [
            "status" => "success",
            "message" => "Add new successfully"
        ];
        return response()->json($data);
    }

    function delete($id) {
        $user = User::find($id);
        $user->roles()->detach();
        $user->delete();
        $data = [
            "status" => "success",
            "message" => "Delete user successfully"
        ];
        return response()->json($data);
    }

    function findById($id) {
        $user = User::with('roles')->find($id);
        if (!$user){
            $data = [
                "status" => "error",
                "message" => "User not found!"
            ];
            return response()->json($data);
        }
        $data = [
            "status" => "success",
            "user" => $user
        ];
        return response()->json($data);
    }

    function update(Request $request, $id) {
        $user = User::find($id);
        if (!$user){
            $data = [
                "status" => "error",
                "message" => "User not found!"
            ];
            return response()->json($data);
        }
        $user->name = $request->name;
        $user->email = $request->email;
        $user->save();

        //them role user
        $user->roles()->sync($request->roles);
        $data = [
            "status" => "success",
            "message" => "Update user successfully"
        ];
        return response()->json($data);
    }

}
