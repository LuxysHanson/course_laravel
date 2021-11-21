<?php

namespace App\Http\Controllers\Admin;

use App\Components\Enums\ApplicationEnum;
use App\Components\Enums\News\ExportTypeEnum;
use App\Components\Helpers\ImageHelper;
use App\Exports\NewsExport;
use App\Http\Controllers\Controller;
use App\Models\Category;
use App\Models\News;
use Illuminate\Http\Request;
use Illuminate\Support\Str;
use Maatwebsite\Excel\Facades\Excel;

class NewsController extends Controller
{

    protected $prefix_view = 'admin.news';

    public function index()
    {
        $news = News::query()->filter()->orderBy('created_at', 'DESC')->paginate(15);

        return $this->render('index')->with('news', $news);
    }

    public function create()
    {
        $categories = Category::query()->pluck('title', 'id')->all();

        return $this->render('create', [
            'categories' => $categories
        ]);
    }

    public function edit(News $news)
    {
        $categories = Category::query()->pluck('title', 'id')->all();

        return $this->render('edit', [
            'news' => $news,
            'categories' => $categories
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
        $news->fill($request->all());
        $news->slug = Str::slug($news->title);
        $news->image = ImageHelper::getImageUrlToSaving($request->file('image'));
        $news->save();

        return redirect()->route('admin.news.index')->with('message', 'Новость успешно изменено!');
    }

    public function store(Request $request, News $news)
    {
        $news->fill($request->all());
        $news->slug = Str::slug($news->title);
        $news->image = ImageHelper::getImageUrlToSaving($request->file('image'));
        $news->save();

        if ($request->get('place') === ApplicationEnum::TYPE_FRONTEND) {
            return redirect()->route('news.index');
        }
        return redirect()->route('admin.news.index')->with('message', 'Новость успешно добавлено!');
    }

    public function export(Request $request)
    {
        $fileName = 'news_list_'. date('Y-m-d_H_i');

        if ((int)$request->get('type') != ExportTypeEnum::TYPE_JSON) {
            return Excel::download(new NewsExport,  $fileName. '.xlsx');
        }

        $allNews = News::query()->get()->all();
        return response()->json($allNews)
            ->header('Content-Disposition', 'attachment; filename = '. $fileName .'.txt')
            ->setEncodingOptions(JSON_UNESCAPED_UNICODE | JSON_PRETTY_PRINT);
    }

}
