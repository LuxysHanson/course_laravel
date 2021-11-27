<?php

namespace App\Http\Controllers;

use App\Models\Category;
use App\Models\News;

class NewsController extends Controller
{

    protected $prefix_view = 'pages.news';

    public function index()
    {
        $news = News::query()->where([ 'is_moderate' => 0 ])->paginate(3);

        return $this->render('index')->with('news', $news);
    }

    public function view(int $id)
    {
        $news = News::query()->find($id);

        return $this->render('view')->with('news', $news);
    }

    public function add()
    {
        $categories = Category::query()->pluck('title', 'id')->all();

        return $this->render('add', [
            'categories' => $categories
        ]);
    }

}
