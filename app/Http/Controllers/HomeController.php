<?php

namespace App\Http\Controllers;

use App\Models\News;

class HomeController extends Controller
{

    public function index(News $news)
    {
        return view('index')->with([
            'latestNews' => $news->getLatestNews()
        ]);
    }

}
