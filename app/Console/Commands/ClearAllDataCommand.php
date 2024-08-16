<?php

namespace App\Console\Commands;

use Illuminate\Console\Command;

class ClearAllDataCommand extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'app:data-clear';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Remve all articles, links, etc...';

    /**
     * Execute the console command.
     */
    public function handle()
    {
        // Clear all article_link pivot table
        \App\Models\ArticleLink::query()->delete();

        // Clear all articles
        \App\Models\Article::query()->delete();

        // Clear all links
        \App\Models\Link::query()->delete();

        // Clear all link_groups
        \App\Models\LinkGroup::query()->delete();

        // Clear all categories
        \App\Models\Category::query()->delete();

        return $this->info('All data cleared');
    }
}
