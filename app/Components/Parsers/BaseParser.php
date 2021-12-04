<?php

namespace App\Components\Parsers;

use Orchestra\Parser\Xml\Facade as XmlParser;

abstract class BaseParser
{

    abstract public function getLink(): string;
    abstract protected function dataGeneration(array $data): array;

    protected $xml;

    public function __construct()
    {
        $this->xml = XmlParser::load($this->getLink());
    }

    public function getParsingData(int $limit): array
    {
        $data = $this->xml->parse([
            'title' => ['uses' => 'channel.title'],
            'link' => ['uses' => 'channel.link'],
            'description' => ['uses' => 'channel.description'],
            'news' => ['uses' => 'channel.item[title,description,pubDate,enclosure::url,category]'],
        ]);
        $news = array_slice($data['news'], 0, $limit);
        return $this->dataGeneration($news ?? []);
    }

}
