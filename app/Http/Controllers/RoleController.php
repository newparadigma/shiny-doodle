<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use \App\User;
use \App\Role;

class RoleController extends Controller
{

    public function list()
    {
        $roles = Role::all();
        return view('roles.list', compact('roles'));
    }
    public function profile($id)
    {
      $roles = Role::findOrFail($id);
      return view('roles.profile', compact('roles'));
    }
    public function new()
    {
        return view('roles.new');
    }
    public function create(Request $request) {
         $roles = new \App\Role();
         $roles->name = $request->name;
         $roles->save();
         return redirect()->route('roles.list');
    }
    public function edit($id)
    {
      $roles = Role::findOrFail($id);
      return view('roles.edit', compact('roles'));
    }

    public function update($id, Request $request) {
      $roles = Role::findOrFail($id);
      $roles->name = $request->name;
      $roles->update();
      $roles->permissions()->sync($request->permissionsIds);
      return redirect()->route('roles.profile', $roles->id);
    }

    public function delete($id) {
      $roles = Role::findOrFail($id);
      $roles->delete();
      return redirect()->route('roles.list');
    }

}
