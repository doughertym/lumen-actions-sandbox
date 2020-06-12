<?php
namespace App\Console\Commands;

use Illuminate\Console\Command;
use Symfony\Component\Process\Process;

class VersionCommand  extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'version';

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
        $hash = exec("git rev-parse --short HEAD");
        $this->info("MAJOR = 1");
        $this->info("MINOR = 0");
        $this->info("PATCH = 1");
        $this->info("SHORT_HASH = $hash");
//        $getenv = getenv();
//        foreach ($getenv as $name => $value) {
//            $this->info("$name = $value");
//        }
    }
}