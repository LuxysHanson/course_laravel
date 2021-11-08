<?php

namespace App\Http\Controllers;

use App\Models\Categories;

class CategoriesController extends Controller
{

    protected $prefix_view = 'pages/categories';

    public function index(Categories $categories)
    {

        return $this->render('index', [
            'categories' => $categories->getCategories()
        ]);
    }

    public function view(Categories $categories, int $id)
    {

        return $this->render('view', [
            'category' => $categories->getCategoryById($id),
            'news' => $categories->getNewsByCategoryId($id)
        ]);
    }

}
