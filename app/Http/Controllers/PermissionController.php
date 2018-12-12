<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use \App\Permission;

class PermissionController extends Controller
{
  public function list()
  {
      $permissions = Permission::all();
      return view('permissions.list', compact('permissions'));
  }
  public function profile($id)
  {
    $permissions = Permission::findOrFail($id);
    return view('permissions.profile', compact('permissions'));
  }
  public function new()
  {
      return view('permissions.new');
  }
  public function create(Request $request) {
       $permissions = new \App\Permission();
       $permissions->name = $request->name;
       $permissions->display_name = $request->display_name;
       $permissions->save();
       return redirect()->route('permissions.list');
  }
  public function edit($id)
  {
    $permissions = Permission::findOrFail($id);
    return view('permissions.edit', compact('permissions'));
  }

  public function update($id, Request $request) {
    $permissions = Permission::findOrFail($id);
    $permissions->name = $request->name;
    $permissions->display_name = $request->display_name;
    $permissions->update();
    $permissions->roles()->sync($request->roleIds);
    return redirect()->route('permissions.profile', $permissions->id);
  }
  public function delete($id) {
    $permissions = Permission::findOrFail($id);
    $permissions->delete();
    return redirect()->route('permissions.list');
  }
}
