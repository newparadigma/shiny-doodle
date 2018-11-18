<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use \App\User;
use \App\Book;
use \App\News;
use \App\Role;

class UserController extends Controller
{

    public function userList()
    {
        $users = User::all();
        return view('users.userList', compact('users'));
    }
    public function profile($id)
    {
        $user = User::findOrFail($id);
        return view('users.profile', compact('user'));
    }
    public function newUser()
    {
        return view('users.newUser');
    }
    public function createUser(Request $request) {
       if ($request->password == $request->confirm_password) {
         $user = new \App\User();
         $user->name = $request->name;
         $user->email = $request->email;
         $user->password = $request->password;
         $user->save();
       }
       return redirect()->route('users.userList');
    }
    public function newRoles($id)
    {
        $user = User::findOrFail($id);
        return view('users.newRoles', compact('user'));
    }
    public function updateRole(Request $request, $id) {
       $user = User::findOrFail($id);
       $user->roles()->user_id = $id;
       $user->roles()->role_id = $request->select;
       $user->save();
       return redirect()->route('users.profile', $id);
    }


}
