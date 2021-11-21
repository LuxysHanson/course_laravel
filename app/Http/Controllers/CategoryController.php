<?php

namespace App\Http\Controllers;

use App\Models\Category;

class CategoryController extends Controller
{

    protected $prefix_view = 'pages/categories';

    public function index()
    {
        $categories = Category::query()->paginate(3);

        return $this->render('index', [
            'categories' => $categories
        ]);
    }

    public function view(int $id)
    {
        $category = Category::query()->find($id);
        $news = Category::query()->where('category_id', $id)->get()->all();

        return $this->render('view', [
            'category' => $category,
            'news' => $news
        ]);
    }

}
