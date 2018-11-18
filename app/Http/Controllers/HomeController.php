<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use \App\User;
use \App\Book;
use \App\News;
use \App\Role;

class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth');
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view('home');
    }


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
       $user->roles()->roles = $request->select;
       $user->update();
       return redirect()->route('users.profile', $id);
    }



    public function booksList()
    {
        $books = Book::all();
        return view('books.booksList', compact('books'));
    }
    public function newBook()
    {
        return view('books.newBook');
    }
    public function createBook(Request $request) {
         $book = new \App\Book();
         $book->name = $request->name;
         $book->description = $request->description;
         $book->save();
         return redirect()->route('books.booksList');
    }


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


    public function newsList()
    {
        $news = News::all();
        return view('news.newsList', compact('news'));
    }
    public function newNews()
    {
        return view('news.newNews');
    }
    public function createNews(Request $request) {
         $news = new \App\News();
         $news->title = $request->title;
         $news->text = $request->text;
         // dd(auth()->user()->id);
         $news->user_id = auth()->user()->id;
         $news->save();
         return redirect()->route('news.newsList');
    }
}
