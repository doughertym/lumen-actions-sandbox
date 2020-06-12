<?php
namespace App\Console\Commands;

use Illuminate\Console\Command;

class VersionCommand  extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'version {run_number?} {ref?}';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Read and print a .Net Approvals file';

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
     * @return mixed
     */
    public function handle()
    {
        $run_number = $this->argument('run_number');
        if (!$run_number) {
            $run_number = 0;
        }
        $ref = $this->argument('ref');
        $branch = str_replace(
            '/', '_',
            str_replace('refs/heads/', '', $ref)
        );

        $hash = exec("git rev-parse --short HEAD");
        $this->info("MAJOR = 1");
        $this->info("MINOR = 0");
        $this->info("PATCH = $run_number");
        $this->info("SHORT_HASH = $hash");
        $this->info("BRANCH = " . $branch);
    }
}