<?php

namespace App\Http\Controllers\Admin;

use App\Components\Enums\NewsExportType;
use App\Exports\NewsExport;
use App\Http\Controllers\Controller;
use App\Models\News;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
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

    public function create()
    {
        $categories = DB::table('news_category')->pluck('title', 'id')->all();

        return $this->render('create', [
            'categories' => $categories
        ]);
    }

    public function add(Request $request)
    {
        if ($request->isMethod('post')) {
            $formData = $request->only([
                'title',
                'category_id',
                'description',
                'is_moderate'
            ]);

            $image_url = '';
            if ($image = $request->file('image')) {
                $path = Storage::disk('uploads')->putFile('images/news', $image);
                $image_url = Storage::disk('uploads')->url($path);
            }

            $formData['slug'] = Str::slug($formData['title']);
            $formData['image'] = $image_url;
            $formData['created_at'] = Carbon::now()->format('Y-m-d H:i:s');
            $formData['category_id'] = (int)$formData['category_id'];
            $formData['is_moderate'] = (int)$formData['is_moderate'];

            DB::table('news')->insert($formData);

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

        return response()->json(DB::table('news')->get()->all())
            ->header('Content-Disposition', 'attachment; filename = '. $fileName .'.txt')
            ->setEncodingOptions(JSON_UNESCAPED_UNICODE | JSON_PRETTY_PRINT);
    }

}
