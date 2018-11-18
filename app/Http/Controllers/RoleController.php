<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use \App\User;
use \App\Role;

class RoleController extends Controller
{

    public function rolesList()
    {
        $roles = Role::all();
        return view('roles.rolesList', compact('roles'));
    }
    public function newRole()
    {
        return view('roles.newRole');
    }
    public function createRole(Request $request) {
         $roles = new \App\Role();
         $roles->name = $request->name;
         $roles->save();
         return redirect()->route('roles.rolesList');
    }


}
