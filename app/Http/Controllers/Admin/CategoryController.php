<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\CategoriesRequest;
use App\Interfaces\CategoryRepositoryInterface;
use App\Models\Category;
use Illuminate\Http\Request;

class CategoryController extends Controller
{

    protected $prefix_view = 'admin.categories';

    /** @var CategoryRepositoryInterface $repository */
    private $repository;

    public function __construct(CategoryRepositoryInterface $categoryRepository)
    {
        $this->repository = $categoryRepository;
    }

    public function index()
    {
        $categories = Category::query()->paginate(15);

        return $this->render('index')->with('categories', $categories);
    }

    public function create()
    {
        return $this->render('create');
    }

    public function edit(Category $category)
    {
        return $this->render('edit')->with('category', $category);
    }

    public function show(Category $category)
    {
        return $this->render('show')->with('category', $category);
    }

    public function destroy(Category $category)
    {
        $category->delete();
        return redirect()->route('admin.categories.index')->with('message', 'Категория успешно удалено!');
    }

    public function update(CategoriesRequest $request, Category $category)
    {
        $this->repository->dataStorage($request, $category);
        return redirect()->route('admin.categories.index')->with('message', 'Категория успешно изменено!');
    }

    public function store(CategoriesRequest $request, Category $category)
    {
        $this->repository->dataStorage($request, $category);
        return redirect()->route('admin.categories.index')->with('message', 'Категория успешно добавлена!');
    }

    public function export(Request $request)
    {
        return $this->repository->dataExport((int)$request->get('type'));
    }

}
