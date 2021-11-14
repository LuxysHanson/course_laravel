<?php

namespace App\Http\Controllers\Admin;

use App\Components\Enums\NewsExportType;
use App\Exports\NewsExport;
use App\Http\Controllers\Controller;
use App\Models\Category;
use App\Models\News;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\File;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Str;
use Maatwebsite\Excel\Facades\Excel;

class NewsController extends Controller
{

    protected $prefix_view = 'admin.news';

    public function index()
    {
        return $this->render('index');
    }

    public function create(Category $categories)
    {

        return $this->render('create', [
            'categories' => $categories->getCategoriesForForm()
        ]);
    }

    public function add(Request $request, News $news)
    {
        if ($request->isMethod('post')) {
            $formData = $request->only([
                'title',
                'category_id',
                'text',
                'is_moderate'
            ]);

            $data = $news->getNews();
            $data[] = $formData;
            $lastKey = array_key_last($data);

            $image_url = '';
            if ($image = $request->file('image')) {
                $path = Storage::putFile('public/images/news', $image);
                $image_url = Storage::url($path);
            }

            $data[$lastKey]['id'] = $lastKey;
            $data[$lastKey]['slug'] = Str::slug($formData['title']);
            $data[$lastKey]['image'] = $image_url;
            $data[$lastKey]['created_at'] = Carbon::now()->format('Y-m-d H:i:s');
            $data[$lastKey]['category_id'] = (int)$formData['category_id'];
            $data[$lastKey]['is_moderate'] = (int)$formData['is_moderate'];


            File::put(storage_path() . '/news.json', json_encode($data, JSON_UNESCAPED_UNICODE | JSON_PRETTY_PRINT));

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
