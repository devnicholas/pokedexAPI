<?php 

namespace App\Console\Commands;

use App\Ranking;
use Illuminate\Console\Command;

class RankingReload extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'ranking:reload';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Reload the Ranking of game';

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
     * @return void
     */
    public function handle()
    {
        $ranking = new Ranking();
        $ranking->where('id', '<>', null)->delete();
        $this->info('Ranking is clear!!');
    }
}