<?php

namespace App\Http\Controllers\Admin;

use App\Enums\NewsExportType;
use App\Exports\NewsExport;
use App\Http\Controllers\Controller;
use App\Models\Categories;
use App\Models\News;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\File;
use Illuminate\Support\Str;
use Maatwebsite\Excel\Facades\Excel;

class NewsController extends Controller
{

    protected $prefix_view = 'admin.news';

    public function index()
    {
        return $this->render('index');
    }

    public function create(Categories $categories)
    {

        return $this->render('create', [
            'categories' => $categories->getCategoriesForForm()
        ]);
    }

    public function add(Request $request, News $news)
    {
        if ($request->isMethod('post')) {
            $formData = $request->except('_token');

            $news = $news->getNews();
            $lastKey = array_key_last($news);

            $formData['id'] = ++$lastKey;
            $formData['slug'] = Str::slug($formData['title']);
            $formData['image'] = ''; // заглушка
            $formData['created_at'] = Carbon::now()->format('Y-m-d H:i:s');
            $formData['category_id'] = (int)$formData['category_id'];
            $formData['is_moderate'] = (int)$formData['is_moderate'];

            $news[$lastKey] = $formData;

            File::put(storage_path() . '/news.json', json_encode($news, JSON_UNESCAPED_UNICODE | JSON_PRETTY_PRINT));

            if ($request->get('place') == 'frontend') {
                return redirect()->route('news.index');
            }
            return redirect()->route('admin.news.index')->with('message', 'Новость успешно добавлено!');
        }
        return '';
    }

    public function export(Request $request, News $news)
    {
        $fileName = 'news_list_'. date('Y-m-d_H_i');

        if ((int)$request->get('type') != NewsExportType::TYPE_JSON) {
            return Excel::download(new NewsExport,  $fileName. '.xlsx');
        }

        return response()->json($news->getNews())
            ->header('Content-Disposition', 'attachment; filename = '. $fileName .'".txt"')
            ->setEncodingOptions(JSON_UNESCAPED_UNICODE | JSON_PRETTY_PRINT);
    }

}