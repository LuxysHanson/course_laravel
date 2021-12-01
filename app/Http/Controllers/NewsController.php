<?php

namespace App\Http\Controllers;

use App\Http\Requests\NewsRequest;
use App\Interfaces\NewsRepositoryInterface;
use App\Models\News;
use App\Repositories\NewsRepository;

class NewsController extends Controller
{

    protected $prefix_view = 'pages.news';

    /** @var NewsRepository $repository */
    private $repository;

    public function __construct(NewsRepositoryInterface $newsRepository)
    {
        $this->repository = $newsRepository;
    }

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
        return $this->render('add', [
            'categories' => $this->repository->getCategoryList()
        ]);
    }

    public function create(NewsRequest $request, News $news)
    {
        $this->repository->dataStorage($request, $news);
        return redirect()->route('news.index');
    }

}
