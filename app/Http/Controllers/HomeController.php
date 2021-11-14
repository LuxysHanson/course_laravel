<?php

namespace App\Http\Controllers;

use App\Models\News;

class HomeController extends Controller
{

    public function index(News $news)
    {
//        $latestNews =
        return view('index')->with([
            'latestNews' => $news->getLatestNews()
        ]);
    }

}
