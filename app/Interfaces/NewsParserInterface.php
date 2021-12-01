<?php

namespace App\Interfaces;

interface NewsParserInterface
{
    public function getParsingData(int $limit): array;

}
