<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use \App\User;
use \App\News;

class NewsController extends Controller
{

    public function list()
    {
        $news = News::all();
        return view('news.list', compact('news'));
    }
    public function new()
    {
        return view('news.new');
    }
    public function create(Request $request) {
         $news = new \App\News();
         $news->title = $request->title;
         $news->text = $request->text;
         // dd(auth()->user()->id);
         $news->user_id = auth()->user()->id;
         $news->save();
         return redirect()->route('news.list');
    }
}
