<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use \App\User;
use \App\Book;

class BookController extends Controller
{

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


}
