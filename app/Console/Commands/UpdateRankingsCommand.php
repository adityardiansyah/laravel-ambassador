<?php

namespace App\Console\Commands;

use App\User;
use Illuminate\Console\Command;
use Illuminate\Support\Facades\Redis;

class UpdateRankingsCommand extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'update:rankings';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Command description';

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
        $ambassador = User::ambassadors()->get();

        $bar = $this->output->createProgressBar($ambassador->count());

        $bar->start();

        $ambassador->each(function(User $user)use($bar){
            Redis::zadd('rankings', (int)$user->revenue, $user->name);

            $bar->advance();
        });

        $bar->finish();
    }
}
