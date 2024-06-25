<?php

namespace App\Console\Commands;

use App\Services\Api\ArticleService;
use App\Services\Api\LinkService;
use Illuminate\Console\Command;

class SyncDataCommand extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'data:sync';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Syncs all the data from seo app';

    /**
     * Execute the console command.
     */
    public function handle()
    {
        (new ArticleService)->sync();
        (new LinkService)->sync();

        return Command::SUCCESS;
    }
}
