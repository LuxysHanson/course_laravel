<?php

namespace App\Interfaces;

interface ParserRepositoryInterface
{
    public function parsingNews(NewsParserInterface $parser, int $limit = 10);

}
