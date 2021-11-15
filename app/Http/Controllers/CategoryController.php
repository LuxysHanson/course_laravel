<?php

namespace App\Http\Controllers;

use Illuminate\Support\Facades\DB;

class CategoryController extends Controller
{

    protected $prefix_view = 'pages/categories';

    public function index()
    {
        $categories = DB::table('news_category')->get()->all();

        return $this->render('index', [
            'categories' => $categories
        ]);
    }

    public function view(int $id)
    {
        $category = DB::table('news_category')->find($id);
        $news = DB::table('news')->where('category_id', $id)->get()->all();

        return $this->render('view', [
            'category' => $category,
            'news' => $news
        ]);
    }

}
