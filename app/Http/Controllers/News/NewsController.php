<?php

namespace App\Http\Controllers\News;

use App\Http\Controllers\Controller;
use App\Models\News;
use Illuminate\Http\Request;

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
