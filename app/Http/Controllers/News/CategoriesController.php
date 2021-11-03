<?php

namespace App\Http\Controllers\News;

use App\Http\Controllers\Controller;
use App\Models\Categories;
use Illuminate\Http\Request;

class CategoriesController extends Controller
{

    public function index()
    {
        $categories = Categories::getCategories();

        return view('news.categories.index', [
            'categories' => $categories
        ]);
    }

    public function view($id)
    {
        $newsByCategory = Categories::getNewsByCategory($id);

        return view('news.categories.view', [
            'news' => $newsByCategory
        ]);
    }

}
