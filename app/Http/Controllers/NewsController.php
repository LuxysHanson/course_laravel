<?php

namespace App\Http\Controllers;

use App\Models\News;

class NewsController extends Controller
{

    protected $prefix_view = 'pages.news';

    public function index()
    {
        $news = News::getNews();

        return $this->render('index')->with('news', $news);
    }

    public function view($id)
    {
        $news = News::getNewsId($id);

        return $this->render('view')->with('news', $news);
    }

}
