<?php

namespace App\Http\Controllers;

use App\Models\News;

class HomeController extends Controller
{

    public function index()
    {
        $latestNews = News::query()->where([
            'is_moderate' => 0
        ])->orderBy('created_at', 'DESC')->limit(3)->get()->all();

        return view('index')->with('latestNews', $latestNews);
    }

}
