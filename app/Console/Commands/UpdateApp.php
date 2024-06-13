<?php

namespace App\Console\Commands;

use Illuminate\Console\Command;
use Illuminate\Support\Facades\Process;

// use Symfony\Component\Process\Process;

class UpdateApp extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'app:pull';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Pull files from GIT';

    /**
     * Is the code already updated or not
     */
    private bool $alreadyUpToDate = false;

    /**
     * Log from git pull
     *
     * @var array
     */
    private $pullLog = [];

    /**
     * Log from composer install
     */
    private array $composerLog = [];

    public function __construct()
    {
        parent::__construct();
    }

    /**
     * Execute the console command.
     *
     * @return mixed
     */
    public function handle()
    {
        if (! $this->runPull()) {
            $this->error("An error occurred while executing 'git pull'. \nLogs:");

            foreach ($this->pullLog as $logLine) {
                $this->info($logLine);
            }

            return;
        }

        if ($this->alreadyUpToDate) {
            $this->info('The application is already up-to-date');

            return;
        }

        if (! $this->runComposer()) {
            $this->error("Error while updating composer files. \nLogs:");

            foreach ($this->composerLog as $logLine) {
                $this->info($logLine);
            }

            return;
        }

        $this->info('Succesfully updated the application.');
    }

    private function runPull(): bool
    {
        // $process = new Process(['git', 'pull']); // symfony version
        $this->info("Running 'git pull'");
        $result = Process::run('git pull');

        if (str_ends_with($result->output(), 'public')) {
            $result = Process::run('cd .. && git pull');
        }

        if (str_contains($result->output(), 'Already up to date')) {
            $this->alreadyUpToDate = true;
        }

        return $result->successful();
    }

    /**
     * Run composer install process
     *
     * @return bool
     */
    private function runComposer()
    {
        $this->info("Running 'composer install'");
        $process = Process::run('composer install');

        $this->composerLog[] = $process->output();

        return $process->successful();
    }
}
