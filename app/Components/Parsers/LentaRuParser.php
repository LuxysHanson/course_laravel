<?php

namespace App\Components\Parsers;

use App\Interfaces\NewsParserInterface;

class LentaRuParser extends BaseParser implements NewsParserInterface
{

    public function getParsingData(int $limit): array
    {
        $data = $this->xml->parse([
            'title' => ['uses' => 'channel.title'],
            'link' => ['uses' => 'channel.link'],
            'description' => ['uses' => 'channel.description'],
            'news' => ['uses' => 'channel.item[title,link,description,pubDate,enclosure::url,category]'],
        ]);
        $news = array_slice($data['news'], 0, $limit);
        return $news ?? [];
    }

    function getLink(): string
    {
        return 'https://lenta.ru/rss';
    }

}
