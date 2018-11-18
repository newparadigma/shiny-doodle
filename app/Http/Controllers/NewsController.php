<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use \App\User;
use \App\News;

class NewsController extends Controller
{

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
