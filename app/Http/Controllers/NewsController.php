<?php

namespace App\Http\Controllers;

use App\Models\News;

class NewsController extends Controller
{

    public function index()
    {
        $news = News::getNews();

        return view('news.index')->with('news', $news);
    }

    public function view($id)
    {
        $news = News::getNewsId($id);

        return view('news.view')->with('news', $news);
    }

}
