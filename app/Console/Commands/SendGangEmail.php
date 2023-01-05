<?php

namespace App\Console\Commands;

use Illuminate\Console\Command;
use App\Http\Controllers\GangController;

class SendGangEmail extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'sendgangemail';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Command description';

    /**
     * Execute the console command.
     *
     * @return int
     */
    public function handle()
    {
        //return Command::SUCCESS;
        GangController::testCron();
        return $this->info('Mail envoyé');
    }
}
