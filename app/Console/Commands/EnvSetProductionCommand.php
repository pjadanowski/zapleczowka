<?php

namespace App\Console\Commands;

use Illuminate\Console\Command;

class EnvSetProductionCommand extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'app:env-set-production';

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
        $env = file_get_contents(base_path('.env'));
    
        $env = preg_replace('/APP_ENV=(.*)/', 'APP_ENV=production', $env);
        $env = preg_replace('/APP_DEBUG=(.*)/', 'APP_DEBUG=false', $env);
        $env = preg_replace('/APP_URL=(.*)/', 'APP_URL=', $env);
        $env = preg_replace('/APP_LOCALE=(.*)/', 'APP_LOCALE=pl', $env);
        
        file_put_contents(base_path('.env'), $env);
    }
}
