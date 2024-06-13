<?php

namespace App\Console\Commands;

use Illuminate\Console\Command;
use Symfony\Component\Process\Process;

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

    /**
     * Run git pull process
     *
     * @return bool
     */
    private function runPull()
    {
        $process = new Process(['git', 'pull']);
        $this->info("Running 'git pull'");

        $process->run(function ($type, $buffer) {
            $this->pullLog[] = $buffer;

            if ($buffer == "Already up to date.\n") {
                $this->alreadyUpToDate = true;
            }
        });

        return $process->isSuccessful();
    }

    /**
     * Run composer install process
     *
     * @return bool
     */
    private function runComposer()
    {
        $process = new Process(['composer', 'install']);
        $this->info("Running 'composer install'");

        $process->run(function ($type, $buffer) {
            $this->composerLog[] = $buffer;
        });

        return $process->isSuccessful();
    }
}
