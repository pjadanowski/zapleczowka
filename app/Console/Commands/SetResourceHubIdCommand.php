<?php

namespace App\Console\Commands;

use Illuminate\Console\Command;

class SetResourceHubAccessTokenCommand extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'app:env-set-resourceHubAccessToken {token}';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Command description';

    /**
     * Execute the console command.
     */
    public function handle()
    {
        $token = $this->argument('token');

        $env = file_get_contents(base_path('.env'));

        $env = preg_replace('/RESOURCE_HUB_ACCESS_TOKEN=(.*)/', 'RESOURCE_HUB_ACCESS_TOKEN=' . $token, $env);

        file_put_contents(base_path('.env'), $env);
    }
}
