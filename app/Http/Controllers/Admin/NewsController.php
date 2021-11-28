<?php

namespace App\Http\Controllers\Admin;

use App\Components\Enums\ApplicationEnum;
use App\Http\Controllers\Controller;
use App\Http\Requests\NewsRequest;
use App\Interfaces\NewsRepositoryInterface;
use App\Models\News;
use Illuminate\Http\Request;

class NewsController extends Controller
{

    protected $prefix_view = 'admin.news';

    /** @var NewsRepositoryInterface $repository */
    private $repository;

    public function __construct(NewsRepositoryInterface $newsRepository)
    {
        $this->repository = $newsRepository;
    }

    public function index()
    {
        $news = News::query()->filter()->orderBy('created_at', 'DESC')->paginate(15);

        return $this->render('index')->with('news', $news);
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

    public function update(NewsRequest $request, News $news)
    {
        $this->repository->dataStorage($request, $news);
        return redirect()->route('admin.news.index')->with('message', 'Новость успешно изменено!');
    }

    public function store(NewsRequest $request, News $news)
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
