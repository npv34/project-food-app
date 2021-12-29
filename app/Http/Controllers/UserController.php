<?php

namespace App\Http\Controllers;

use App\Http\Requests\StoreUserRequest;
use App\Models\Role;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Gate;
use Illuminate\Support\Facades\Hash;

class UserController extends Controller
{
    function create() {
//        if (!$this->userCan('crud-user')) {
//            abort(403);
//        }
        $roles = Role::all();
        return view('admin.users.create', compact('roles'));
    }

    function store(StoreUserRequest $request) {
//        if (!$this->userCan('crud-user')) {
//            abort(403);
//        }
        // tao user
        $user = new User();
        $user->name = $request->name;
        $user->email = $request->email;
        $user->password = Hash::make($request->password);
        $user->save();

        //them role user
        $user->roles()->sync($request->roles);
        session()->flash('add_success', 'Add new user successfully!');
        return redirect()->route('users.index');

    }

    function index() {
        $users = User::orDerBy('id','DESC')->paginate(20);
        return view('admin.users.list', compact('users'));
    }

    function edit(Request $request, $id) {
        if (!Gate::allows('crud-user')) {
            abort(403);
        }
        $user = User::findOrFail($id);
        $user->name = $request->name;
        $user->save();
        $user->roles()->sync($request->roles);
        return redirect()->route('users.index');
    }

    function delete($id){
//        if (!Gate::allows('crud-user')) {
//            abort(403);
//        }
        $user = User::findOrFail($id);
        $user->roles()->detach();
        $user->delete();
        return response()->json(['message' => __('message.delete_success')]);
    }
}
