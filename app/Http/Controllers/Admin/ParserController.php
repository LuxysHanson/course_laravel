<?php

namespace App\Http\Controllers\Admin;

use App\Components\Enums\NewsParserEnum;
use App\Http\Controllers\Controller;
use App\Interfaces\ParserRepositoryInterface;
use Illuminate\Http\Request;

class ParserController extends Controller
{

    protected $prefix_view = 'admin';

    /** @var ParserRepositoryInterface $repository */
    private $repository;

    public function __construct(ParserRepositoryInterface $parserRepository)
    {
        $this->repository = $parserRepository;
    }

    public function index()
    {
        return $this->render('parser');
    }

    public function parse(Request $request)
    {
        $class = NewsParserEnum::getClassByParse((int)$request->get('source'));
        if (empty($class)) {
            $messages = [
                'error' => 'Не найден класс для парсинга данного типа!'
            ];
        }
        $this->repository->parsingNews(new $class(), $request->get('limit'));

        $messages = array('success' => 'Операция прошла успешно!');
        return redirect()->route('admin.parser.index')->with($messages);
    }

}
