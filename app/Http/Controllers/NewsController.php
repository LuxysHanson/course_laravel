<?php

namespace App\Http\Controllers;

use Illuminate\Support\Facades\DB;

class NewsController extends Controller
{

    protected $prefix_view = 'pages.news';

    public function index()
    {
        $news = DB::table('news')->where([
            'is_moderate' => 0
        ])->get()->all();

        return $this->render('index')->with('news', $news);
    }

    public function view(int $id)
    {
        $news = DB::table('news')->find($id);

        return $this->render('view')->with('news', $news);
    }

    public function add()
    {
        $categories = DB::table('news_category')->pluck('title', 'id')->all();

        return $this->render('add', [
            'categories' => $categories
        ]);
    }

}
