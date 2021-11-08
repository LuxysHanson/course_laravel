<?php

namespace App\Http\Controllers;

use App\Models\News;

class NewsController extends Controller
{

    protected $prefix_view = 'pages.news';

    public function index(News $news)
    {

        return $this->render('index')->with('news', $news->getNews());
    }

    public function view(News $news, int $id)
    {

        return $this->render('view')->with('news', $news->getNewsById($id));
    }

}
