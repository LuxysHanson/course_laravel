<?php

namespace App\Components\Parsers;

use Orchestra\Parser\Xml\Facade as XmlParser;

abstract class BaseParser
{

    abstract function getLink(): string;

    protected $xml;

    public function __construct()
    {
        $this->xml = XmlParser::load($this->getLink());
    }

}
