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


}
