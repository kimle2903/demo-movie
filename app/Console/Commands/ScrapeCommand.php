<?php

namespace App\Console\Commands;

use Illuminate\Console\Command;

class ScrapeCommand extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    // protected $signature = 'scrapeFilm:movie';
    protected $signature = 'scrapeFilmDetail:movie';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Command film ';

    /**
     * Create a new command instance.
     *
     * @return void
     */
    public function __construct()
    {
        parent::__construct();
    }

    /**
     * Execute the console command.
     *
     * @return int
     */
    public function handle()
    {
        $bot = new \App\Scraper\filmDetail();
        $bot->scraperFilmDetail();
    }
}
