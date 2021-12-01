<?php

namespace App\Http\Controllers\Admin;

use App\Components\Enums\NewsParserEnum;
use App\Http\Controllers\Controller;
use App\Http\Requests\ParserNewsRequest;
use App\Interfaces\ParserRepositoryInterface;

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

    public function news(ParserNewsRequest $request)
    {
        $request->validated();

        $class = NewsParserEnum::getClassByParse((int)$request->get('source'));
        $isParsingSuccess = $this->repository->parsingNews(new $class(), $request->get('limit'));

        $messages = $isParsingSuccess
                    ? array('message' => 'Операция прошла успешно!')
                    : array('warning' => 'Произошла ошибка при парсиинге нововстей');

        return redirect()->route('admin.parser.index')->with($messages);
    }

}
