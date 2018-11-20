<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use \App\User;

class UserController extends Controller
{
  private function requestValidate($request)
  {
    if ($request->password == $request->confirm_password) {
      return true;
    }
  }

  public function list()
  {
    $users = User::orderBy('name', 'asc')->get();
    return view('user.list', compact('users'));
  }

  public function profile($id)
  {
    $user = User::findOrFail($id);
    return view('user.profile', compact('user'));
  }

  public function new()
  {
    return view('user.new');
  }

  public function create(Request $request) {
    if ($this->requestValidate($request)) {
      $user = new User();
      $user->name = $request->name;
      $user->email = $request->email;
      $user->password = $request->password;
      $user->save();
    }

    return redirect()->route('users.profile', $user->id);
  }

  public function edit($id)
  {
    $user = User::findOrFail($id);
    return view('user.edit', compact('user'));
  }

  public function update($id, Request $request) {
    if ($request->password) {
      if (!$this->requestValidate($request)) {
        return redirect()->back();
      }
    }

    $user = User::findOrFail($id);
    $user->name = $request->name;
    $user->email = $request->email;
    if ($request->password) {
      $user->password = $request->password;
    }
    $user->update();

    $user->roles()->sync($request->roleIds);
    return redirect()->route('users.profile', $user->id);
  }
}
