<?php

namespace App\Http\Controllers;

use App\Models\Categories;

class CategoriesController extends Controller
{

    protected $prefix_view = 'pages/categories';

    public function index()
    {
        $categories = Categories::getCategories();

        return $this->render('index', [
            'categories' => $categories
        ]);
    }

    public function view($id)
    {
        $newsByCategory = Categories::getNewsByCategory($id);

        return $this->render('view', [
            'news' => $newsByCategory
        ]);
    }

}
