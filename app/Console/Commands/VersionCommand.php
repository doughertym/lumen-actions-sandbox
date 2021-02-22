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
    protected $signature = 'deploy:version {run_number?} {ref?}';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Create a versions file';

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
        $date = exec("git show -s --format=%ci {$hash}");

        $versions = [
            'groupvitals-ccb' => [
                'major' => 1,
                'minor' => 0,
                'patch' => $run_number,
                'branch' => $branch,
                'hash' => $hash,
                'date' => $date
            ],
            'lumen' => 'v6.3.5'
        ];
        echo json_encode($versions, JSON_PRETTY_PRINT);
    }
}