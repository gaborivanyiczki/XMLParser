<?php

namespace App\Http\Controllers;

use App\Role;
use Illuminate\Http\Request;

class AdminController extends Controller
{

    public function __construct()
    {
        $this->middleware('auth');
        //$this->middleware('admin');
    }

    public function index(){

        return view('admin.index');
    }

    public function roles(){

        return view('admin.roles');
    }

    public function indexRole()
    {
        $roles = Role::all();

        return response()->json([
            'roles' => $roles,
        ],200);
    }

    public function storeRoles(Request $request){

        $this->validate($request, [
            'name' => 'required',
            'display_name' => 'required'
        ]);

        $role = Role::create([
            'name' => request('name'),
            'display_name' => request('display_name')
        ]);

        return response()->json([
            'role' => $role,
            'message' => 'Success'
        ],200);
    }

    public function updateRole(Request $request, Role $role)
    {
        $this->validate($request,[
            'name' => 'required',
            'display_name' => 'required'
        ]);

        $role->name = request('name');
        $role->display_name = request('display_name');
        $role->save();


        return response()->json([
            'message' => 'Role updated successfully!'
        ],200);
    }

    public function destroyRole(Role $role)
    {
        $role->delete();
        return response()->json([
            'message' => 'Role deleted successfully!'
        ], 200);
    }
}
