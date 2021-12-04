<?php

namespace App\Jobs;

use App\Interfaces\ParserRepositoryInterface;
use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Foundation\Bus\Dispatchable;
use Illuminate\Queue\InteractsWithQueue;
use Illuminate\Queue\SerializesModels;

class NewsParsing implements ShouldQueue
{
    use Dispatchable, InteractsWithQueue, Queueable, SerializesModels;

    private $parsingClass;
    private $limit;

    /**
     * Create a new job instance.
     *
     * @return void
     */
    public function __construct(string $class, int $limit)
    {
        $this->limit = $limit;
        $this->parsingClass = $class;
    }

    /**
     * Execute the job.
     *
     * @return void
     */
    public function handle(ParserRepositoryInterface $parserRepository)
    {
        $parser = new $this->parsingClass();
        $parserRepository->parsingNews($parser, $this->limit);
    }
}
