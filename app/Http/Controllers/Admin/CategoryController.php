<?php

namespace App\Http\Controllers\Admin;

use App\Components\Enums\ApplicationEnum;
use App\Http\Controllers\Controller;
use App\Models\News;
use Illuminate\Http\Request;

class CategoryController extends Controller
{

    protected $prefix_view = 'admin.categories';


    public function index()
    {
        $news = News::query()->filter()->orderBy('created_at', 'DESC')->paginate(15);

        return $this->render('index')->with('categories', $news);
    }

    public function create()
    {

        return $this->render('create', [
            'categories' => $this->repository->getCategoryList()
        ]);
    }

    public function edit(News $news)
    {

        return $this->render('edit', [
            'news' => $news,
            'categories' => $this->repository->getCategoryList()
        ]);
    }

    public function show(News $news)
    {

        return $this->render('show', [
            'news' => $news
        ]);
    }

    public function destroy(News $news)
    {
        $news->delete();
        return redirect()->route('admin.news.index')->with('message', 'Новость успешно удалено!');
    }

    public function update(Request $request, News $news)
    {
        $this->repository->dataStorage($request, $news);
        return redirect()->route('admin.news.index')->with('message', 'Новость успешно изменено!');
    }

    public function store(Request $request, News $news)
    {
        $this->repository->dataStorage($request, $news);

        if ($request->get('place') === ApplicationEnum::TYPE_FRONTEND) {
            return redirect()->route('news.index');
        }
        return redirect()->route('admin.news.index')->with('message', 'Новость успешно добавлено!');
    }

    public function export(Request $request)
    {
        return $this->repository->dataExport((int)$request->get('type'));
    }

}
