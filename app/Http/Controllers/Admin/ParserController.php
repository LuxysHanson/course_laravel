<?php

namespace App\Http\Controllers\Admin;

use App\Components\Enums\NewsParserEnum;
use App\Http\Controllers\Controller;
use App\Http\Requests\ParserNewsRequest;
use App\Jobs\NewsParsing;

class ParserController extends Controller
{

    protected $prefix_view = 'admin';

    public function index()
    {
        return $this->render('parser');
    }

    public function news(ParserNewsRequest $request)
    {
        $request->validated();

        $class = NewsParserEnum::getClassByParse((int)$request->get('source'));
        NewsParsing::dispatch($class, $request->get('limit'));

        return redirect()->route('admin.parser.index')->with('message', 'Задача для парсинга успешно добавлена!');
    }

}
