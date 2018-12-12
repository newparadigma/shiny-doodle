<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use \App\User;
use \App\Book;

class BookController extends Controller
{

    public function list()
    {
        $books = Book::all();
        return view('books.list', compact('books'));
    }
    public function new()
    {
        return view('books.new');
    }
    public function create(Request $request) {
         $book = new \App\Book();
         $book->name = $request->name;
         $book->description = $request->description;
         $book->save();
         return redirect()->route('books.list');
    }


}
