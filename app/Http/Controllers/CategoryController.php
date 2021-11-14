<?php

namespace App\Http\Controllers;

use App\Models\Category;

class CategoryController extends Controller
{

    protected $prefix_view = 'pages/categories';

    public function index(Category $categories)
    {

        return $this->render('index', [
            'categories' => $categories->getCategories()
        ]);
    }

    public function view(Category $categories, int $id)
    {

        return $this->render('view', [
            'category' => $categories->getCategoryById($id),
            'news' => $categories->getNewsByCategoryId($id)
        ]);
    }

}
